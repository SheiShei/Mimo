<?php defined('BASEPATH') OR exit('No direct script access allowed');
class accounts extends CI_Controller
{
    function __construct() {
		parent::__construct();

		$this->load->library('facebook');
		$this->load->library('login');
		$this->load->library('mail');
		$this->load->model('get');
    }
    
    public function index(){
		
		if(!$this->login->isLoggedIn()){
		$userData = array();
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
            
            // Preparing data for database insertion
            //if new user ccontinue
            if($userProfile['id']!=null){
	            $userData['oauth_provider'] = 'facebook';
	            $userData['oauth_uid'] = $userProfile['id'];
	            $userData['first_name'] = $userProfile['first_name'];
	            $userData['last_name'] = $userProfile['last_name'];
	            $userData['email'] = $userProfile['email'];
	            $userData['gender'] = $userProfile['gender'];
	            $userData['locale'] = $userProfile['locale'];
	            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
	            $userData['picture_url'] = $userProfile['picture']['data']['url'];
				
				$selector = 'email';
				$condition = array('email'=> $userData['email']);
				if(!$this->get->read('oauth',$condition,$selector)){
					if($userData['email']==null){
						$userData['email']=$userProfile['id'].'@facebook.com';
					}
					$data = array('id'=>null,
								'oauth_provider'=>'facebook',
								'oauth_uid'=>$userData['oauth_uid'],
								'first_name'=>$userData['first_name'],
								'last_name'=>$userData['last_name'],
								'email'=>$userData['email'],
								'gender'=>$userData['gender'],
								'locale'=> $userData['locale'],
								'profile_url'=>$userData['profile_url'],
								'picture_url'=>$userData['picture_url']
								);
					$this->get->create('oauth',$data);
					 //insert data in users table data
	            	$email = $userData['email'];
	            	$selector = 'email';
					$condition = array('email'=>$email);
					if(!$this->get->read('users',$condition,$selector)){
						$fullname = $userData['first_name'].$userData['last_name'];
						$name = preg_replace('/\s+/','',$fullname);
    					$username = $name.rand(0,2999).rand(3000,9999);
						$usersdata = array(
										'id'=>null,
										'username'=>$username,
										'fullname'=>$userData['first_name'].' '.$userData['last_name'],
										'password'=>null,
										'email'=>$email,
										'picture'=>$userData['picture_url'],
										'header'=>'https://i.imgur.com/Np6wf8U.jpg',
							);
						$this->get->create('users',$usersdata);
						$lastid = $this->get->id();
					    $data=array('id'=>null,'user_id'=>$lastid,'about'=>'','genre1'=>'','genre2'=>'','genre3'=>'','career'=>'');
					    $this->get->create('about',$data);
					    $data=array('id'=>null,'user_id'=>$lastid,'follower_id'=>$lastid);
					    $this->get->create('followers',$data);

					    $cstrong = True;
						$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
						$selector = 'id';
						$condition = array('username'=>$username);
						$user_id = $this->get->read('users',$condition,$selector)[0]['id'];
						$data = array('id'=>null,'token'=>sha1($token),'user_id'=>$user_id);
						$this->get->create('login_tokens',$data);

						setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
						setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

						redirect('accounts/Step2/');
					}//end of users table data insertion

					// $cstrong = True;
				 //    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				 //    $data = array('id'=>null,'username'=>$userData['oauth_uid'],'token'=>sha1($token));
				 //    $this->get->create('oauth_token',$data);
					// redirect('accounts/signup/'.$token.'');
				}
				else{
					$cstrong = True;
				    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				    $selector = 'id';
				    $condition = array('email'=>$userData['email']);
				    $user_id = $this->get->read('users',$condition,$selector)[0]['id'];
				    $data = array('id'=>null,'token'=>sha1($token),'user_id'=>$user_id);
				    $this->get->create('login_tokens',$data);
				                  
				    setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
				    setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

				    $modified = date("Y-m-d H:i:s");
				    $data = array('modified'=>$modified);
				    $con = array('email'=>$userData['email']);
				    $this->get->update('users',$data, $con);

				    $this->facebook->destroy_session();
					// Remove user data from session
					$this->session->unset_userdata('userData');
				            redirect('mimo');
				}
				
        	}
        	
        	//if new user cancelled
        	else{
        		redirect('/accounts');
        	}
		}//end of authentication
		
		else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
            $headerdata['title'] = "MimO | Sign up";
			$this->load->view('include/header',$headerdata);
			$this->load->view('mimo_v/newsignup',$data);
			$this->load->view('include/footer');
        }
        }
        else{
        	redirect('mimo');
        }
    }
    public function Step2(){
    	if($this->login->isLoggedIn()){
	    	$headerdata['title'] = "Step 2";
			$this->load->view('include/header',$headerdata);
	    	$this->load->view('mimo_v/newaftersignup');
	    	$this->load->view('include/footer');
    	}
		else{
			redirect('home');
		}
    }

    public function forgot_password(){
    	if(!$this->login->isLoggedIn()){
    		$headerdata['title'] = "Forgot Password";
			$this->load->view('include/header',$headerdata);
	    	$this->load->view('mimo_v/newforgotpass');
	    	$this->load->view('include/footer');
	    }
		else{
			redirect('error');
		}
    }
    public function reset_success(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$headerdata['title'] = "MimO | Reset";
			$this->load->view('include/header',$headerdata);
	    	$this->load->view('mimo_v/success');
	    	$this->load->view('include/footer');
	    }
		else{
			redirect('error');
		}
    }

    public function send_password_reset(){
    	if(isset($_GET['token'])){
    		$token = $_GET['token'];
	    	$selector = 'user_id';
	    	$condition = array('token'=>sha1($token));
	    	if($this->get->read('password_tokens',$condition,$selector)){
	    		$data['token'] = $token;
	    		$headerdata['title'] = "Forgot Password";
				$this->load->view('include/header',$headerdata);
		    	$this->load->view('mimo_v/newresetpass',$data);
		    	$this->load->view('include/footer');
		    }
		    else{
		    	redirect('/error');
		    }
	    }
	    else{
	    	redirect('/error');
	    }
    }

    public function after(){
    	if ($_SERVER['REQUEST_METHOD'] == "POST") {
    		$username = $this->input->post("username");
    		$id = $this->login->isLoggedIn();
    		$condition = array('username'=>$username);
    		if(!$this->get->read('users',$condition,'username')){
    			$condition = array('id'=>$id);
    			$data = array('username'=>$username);
			    $this->get->update('users',$data,$condition);
    			echo json_encode(array('status'=>'continue'));
    		}
    		else{
    			echo json_encode(array('status'=>'stop'));
    		}
    	}
    	else{
			redirect('error');
		}
    }

    public function email(){
    	if ($_SERVER['REQUEST_METHOD'] == "POST") {
    		$email = $this->input->post("email");
    		$condition = array('email'=>$email);
    		if($this->get->read('users',$condition,'email')){
    			$cstrong = True;
	       		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				$selector = 'id';
				$condition = array('email'=>$email);
				$userid = $this->get->read('users',$condition,$selector)[0]['id'];
				$data = array('id'=>null,'token'=>sha1($token),'user_id'=>$userid);
				$this->get->create('password_tokens',$data);
				$this->mail->sendMail('Forgot Password!', "http://localhost/mimo/accounts/send_password_reset?token=$token", $email);
    			echo json_encode(array('status'=>'continue'));
    		}
    		else{
    			echo json_encode(array('status'=>'stop'));
    		}
    	}
    	else{
			redirect('error');
		}
    }

    public function reset(){
    	if ($_SERVER['REQUEST_METHOD'] == "POST") {
    		$pass = $this->input->post("pass");
    		$rpass = $this->input->post("rpass");
    		$cbox = $this->input->post("cbox");
    		$token = $this->input->post("token");
    		$selector = 'user_id';
    		$condition = array('token'=>sha1($token));
    		if($pass==$rpass){
    			$userid = $this->get->read('password_tokens',$condition,$selector)[0]['user_id'];
    			$tokenIsValid = True;
    			if($cbox=='true'){
    				$data = array('user_id'=>$userid);
    				$this->get->del('login_tokens',$data);
    			}
    			$data = array('password'=>password_hash($rpass, PASSWORD_BCRYPT));
    			$condition = array('id'=>$userid);
    			$this->get->update('users',$data,$condition);
    			$data = array('user_id'=>$userid);
    			$this->get->del('password_tokens',$data);
    			echo json_encode(array('status'=>'success'));
    		}
    		else{
    			echo json_encode(array('status'=>'error'));
    		}
    	}
    	else{
			redirect('error');
		}
    }

    public function password_sent(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$headerdata['title'] = "Password sent!";
			$this->load->view('include/header',$headerdata);
	    	$this->load->view('mimo_v/sent_message');
	    	$this->load->view('include/footer');
	    }
		else{
			redirect('error');
		}
    }

  //   public function signup($token) {
  //   	if(!$this->login->isLoggedIn()){
  //   	$condition = array('token'=>sha1($token));
  //   	$authid = $this->get->read('oauth_token',$condition,'username')[0]['username'];
  //   	if($this->get->read('oauth_token',$condition)){
  //   		if(isset($_POST['next'])){
  //   			$username = $this->input->post("stagename");
  //   			if($username==''){
  //   				$username=$authid;
  //   			}
  //   			else{
		//     		$data = array('username'=>$username);
		//     		$id = $this->login->isLoggedIn();
		//     		if(!$this->get->read('users',$data,'username')){
		// 	    		$condition = array('username'=>$authid);
		// 	    		$this->get->update('users',$data,$condition);
			    		
		// 	    		$data = array('token'=>sha1($token));
		// 	    		$this->get->del('oauth_token',$data);

			    		
		//     		}
		//     		else{
		//     			 echo "<script type='text/javascript'>alert('username already taken');</script>";
		//     		}
	 //    		}
	 //    		$cstrong = True;
		// 				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		// 				$selector = 'id';
		// 				$condition = array('username'=>$username);
		// 				$user_id = $this->get->read('users',$condition,$selector)[0]['id'];
		// 				$data = array('id'=>null,'token'=>sha1($token),'user_id'=>$user_id);
		// 				$this->get->create('login_tokens',$data);
							                   
		// 				setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
		// 				setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
		// 	    		redirect('mimo');
  //   		}
  //   	}
  //   	else{
  //   		redirect('/accounts');
  //   	}
  //   	$this->facebook->destroy_session();
		// 			// Remove user data from session
		// 			$this->session->unset_userdata('userData');
  //   	$data['user'] = $authid;
		// $headerdata['title'] = "MimO | Sign up";
		// 	$this->load->view('include/header',$headerdata);
		// 	$this->load->view('mimo_v/aftersignup',$data);
		// 	$this->load->view('include/footer');
		// }
		// else{
		// 	redirect('error');
		// }
  //   }
    public function create(){
    	if ($_SERVER['REQUEST_METHOD'] == "POST") {
    		$email = $this->input->post("email");
    		$fullname = $this->input->post("full");
    		$name = preg_replace('/\s+/','',$fullname);
    		$username = $name.rand(0,2999).rand(3000,9999);
    		$password = $this->input->post("pass");
			if (!$this->get->read('users',array('username'=>$username),'username') || !$this->get->read('users',array('email'=>$email),'email') ){
				$selector = 'username';
				$condition = array('username'=>$username);
	    		if (!$this->get->read('users',$condition,$selector)) {
	    			$selector = 'email';
					$condition = array('email'=>$email);
						if (!$this->get->read('users',$condition,$selector)) {
							$data = array(
								'id'=>null,
								'username'=>$username,
								'fullname'=>$fullname,
								'password'=>password_hash($password, PASSWORD_BCRYPT),
								'email'=>$email,
								'picture'=>'https://i.imgur.com/LQq63AL.jpg',
								'header'=>'https://i.imgur.com/Np6wf8U.jpg',
							);
							$this->get->create('users',$data);
						    $lastid = $this->get->id();
							$data=array('id'=>null,'user_id'=>$lastid,'about'=>'','genre1'=>'','genre2'=>'','genre3'=>'','career'=>'');
							$this->get->create('about',$data);
							$data=array('id'=>null,'user_id'=>$lastid,'follower_id'=>$lastid);
							$this->get->create('followers',$data);

							$cstrong = True;
							$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
							$selector = 'id';
							$condition = array('username'=>$username);
							$user_id = $this->get->read('users',$condition,$selector)[0]['id'];
							$data = array('id'=>null,'token'=>sha1($token),'user_id'=>$user_id);
							$this->get->create('login_tokens',$data);

							setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
							setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
						                    
			    			echo json_encode(array('status'=>"success"));

						}
						else{
							echo json_encode(array('status'=>"error",'eventid'=>1));
						}

	    		}
	    		else{
			    	
	    		}
    		}
    		else{
		    	echo json_encode(array('status'=>"error",'eventid'=>'all'));
    		}
    	}
    	else{
    		redirect('/error');
    	}
    }
    
    public function signin(){
    	if(!$this->login->isLoggedIn()){
	    	$data['authUrl'] =  $this->facebook->login_url();
	    	$headerdata['title'] = "MimO | Sign in";
	    	$this->load->view('include/header',$headerdata);
			$this->load->view('mimo_v/newsignin',$data);
			$this->load->view('include/footer');
		}
		else{
			redirect('mimo');
		}
    }
    public function si(){
    	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	 		$username = $this->input->post("username");
			$password = $this->input->post("password");
			$selector = 'username';
	    	$condition = array('username'=>$username);
		    if($this->get->read('users',$condition,$selector) || $this->get->read('users',array('email'=>$username),'email')){
		    	if($this->get->read('users',$condition,$selector)){
		    		$condition = array('username'=>$username);
		    	}
		    	if($this->get->read('users',array('email'=>$username),'email')){
		    		$condition = array('email'=>$username);
		    	}
		    	$selector = 'password';
			    $query = $this->get->read('users',$condition,$selector);
				    if(password_verify($password,$query[0]['password'])){
				    	$cstrong = True;
			            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
			            $selector = 'id';
			            $user_id = $this->get->read('users',$condition,$selector)[0]['id'];
			            $data = array('id'=>null,'token'=>sha1($token),'user_id'=>$user_id);
			            $this->get->create('login_tokens',$data);
			                   
			            setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
			            setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

			            $modified = date("Y-m-d H:i:s");
					    $data = array('modified'=>$modified);
					    $con = array('username'=>$username);
					    $this->get->update('users',$data, $con);
				    
			            echo json_encode(array('status'=>"success"));
			        }
			        else{
			        	echo json_encode(array('status'=>"error",'eventid'=>1));
		        	}
		        
			}
		    else{
		    	echo json_encode(array('status'=>"error",'eventid'=>0));
		    }
		}
		else{
			redirect('/error');
		}
    }

  //   public function changepass(){
  //   	if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //   		$cbox = $this->input->post("cbox");
  //   		$pass = $this->input->post("pass");
  //   		$rpass = $this->input->post("rpass");
  //   		$token = $this->input->post("token");
  //   		$selector = 'user_id';
  //   		$condition = array('token'=>sha1($token));
  //   		if($this->get->read('password_tokens',$condition,$selector)){
  //   			$userid = $this->get->read('password_tokens',$condition,$selector)[0]['user_id'];
  //   			$tokenIsValid = True;
  //   			if($cbox=='true'){
  //   				$data = array('user_id'=>$userid);
  //   				$this->get->del('login_tokens',$data);
  //   			}
  //   			if($pass==$rpass){
  //   				if (strlen($rpass) >= 6 && strlen($rpass) <= 60) {
  //   					$data = array('password'=>password_hash($rpass, PASSWORD_BCRYPT));
  //   					$condition = array('id'=>$userid);
  //   					$this->get->update('users',$data,$condition);
  //   					$data = array('user_id'=>$userid);
  //   					$this->get->del('password_tokens',$data);
  //   					echo json_encode(array('status'=>"success",'error'=>"None"));
  //   				}
  //   				else{
  //   					echo json_encode(array('status'=>"error",'error'=>"Invalid Password Length"));
  //   				}
  //   			}
  //   			else{
  //   				echo json_encode(array('status'=>"error",'error'=>"password not match"));
  //   			}
		// 	}
		// 	else{
		// 		redirect('/accounts');
		// 	}
		// }
		// else{
		// 	redirect('/accounts');
		// }
  //   }
   //  public function change_password(){
	  //   	if(isset($_GET['token'])){
	  //   		$token = $_GET['token'];
	  //   		$selector = 'user_id';
	  //   		$condition = array('token'=>sha1($token));
	  //   		if($this->get->read('password_tokens',$condition,$selector)){
		 //    		$data['token'] = $_GET['token'];
		 //    		$headerdata['title'] = "MimO | Login/Sign up";
			// 		$this->load->view('include/header',$headerdata);
			// 		$this->load->view('mimo_v/changepass',$data);
			// 		$this->load->view('include/footer');
			// 	}
			// 	else{
			// 		redirect('/accounts');
			// 	}
	  //   	}
	  //   	else{
			// 	redirect('/accounts');
			// }
	
   //  }
  //   public function forgot_password(){
  //   	if(!$this->login->isLoggedIn()){
	 //    	$headerdata['title'] = "MimO | Recover Account";
		// 	$this->load->view('include/header',$headerdata);
		// 	$this->load->view('mimo_v/forgot-password');
		// 	$this->load->view('include/footer');
		// }
		// else{
		// 	redirect('error');
		// }
  //   }
  //   public function fg(){
  //   	if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //   		$email = $this->input->post("email");
  //   		$con = array('email'=>$email);
  //   		if($this->get->read('users',$con,'email')){
  //   			$cstrong = True;
	 //       		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		// 		$selector = 'id';
		// 		$condition = array('email'=>$email);
		// 		$userid = $this->get->read('users',$condition,$selector)[0]['id'];
		// 		$data = array('id'=>null,'token'=>sha1($token),'user_id'=>$userid);
		// 		$this->get->create('password_tokens',$data);
		// 		$this->mail->sendMail('Forgot Password!', "http://localhost/mimo/accounts/change_password?token=$token", $email);
  //   			echo json_encode(array('status'=>"success"));
  //   		}
  //   		else{
  //   			echo json_encode(array('status'=>"error"));
  //   		}
  //   	}
  //   	else{
  //   		redirect('error');
  //   	}
  //   }

   
}