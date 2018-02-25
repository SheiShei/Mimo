
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/util2.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/main2.css">
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="<?php echo base_url('');?>">
                <?php $this->load->view('include/mimologo')?>
                <strong style=" font-family: Kristen ITC;">MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
        </div>
    </nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						<h2 class="text-center" style="font-family:Arial;">Join the <strong style="font-size: 30px; color:black; font-family: Kristen ITC">Mimo</strong> community today.</h2>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "What's your name?">
						<input id="first" class="input100" type="text" name="fullname">
						<span class="focus-input100" data-placeholder="Full name"></span>
					</div>

					<!-- <div id="uservalidate" class="wrap-input100 validate-input" data-validate = "Only use letters, numbers and '_'">
						<input id="user" class="input100" type="text" name="stagename">
						<span class="focus-input100" data-placeholder="Stage name"></span>
					</div> -->

					<div id="emailvalidate" class="wrap-input100 validate-input" data-validate = "Please enter a valid email">
						<input id="email" class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Use at least one letter, one numeral, and eight characters.">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="pass" class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="signup" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="<?php echo $authUrl;?>" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Have an account?
						</span>

						<a class="txt2" href="<?php echo base_url('accounts/signin');?>">
							Log in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="http://localhost/mimo/assets/js/main2.js"></script>

<script type="text/javascript">
var input = $('.validate-input .input100');
    $('#signup').click(function(e) {
        e.preventDefault();
        var email = $("input[name='email']").val();
        var full = $("input[name='fullname']").val();
        var pass = $("input[name='pass']").val();
        var stage = $("input[name='stagename']").val();
        var count = 0;
        // $('#uservalidate').attr('data-validate', "Only use letters, numbers and '_'.");
        for(var i=0; i<input.length; i++) {
        	if($(input[i]).attr('name') == 'email') {
        		if($(input[i]).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null){
        			showValidate(input[i]);
        			$('#emailvalidate').attr('data-validate', "Please enter a valid email.");
        			count++;
        		}
        	}

            else{
	        	if($(input[i]).attr('name') == 'pass') {
	        		if($(input[i]).val().trim().match(/^(?=.*\d)(?=.*[a-z]).{8,160}$/) == null){
	        			showValidate(input[i]);
	        			count++;
	        		}
	        	}
            	if(($(input[i]).val().trim() == '')){
            		showValidate(input[i]);
            		count++;
            	}
            }
        }
        if(count==0){
        $.ajax({
            type: 'POST',
            url: 'http://localhost/mimo/accounts/create',
            data:{
                email:email,
                pass:pass,
                full:full,
            },
            success: function(response){
                var res = JSON.parse(response)
                console.log(res);
                if(res.status != "success"){
                	if(res.eventid == 'all'){
                		// showValidate(input[1]);
                		// $('#uservalidate').attr('data-validate', "Stage Name is already registered");
                		showValidate(input[1]);
                		$('#emailvalidate').attr('data-validate', "This email is already registered.");
                	}
                	// else if(res.eventid == 1){
                	// 	showValidate(input[res.eventid]);
                	// 	$('#uservalidate').attr('data-validate', "Stage Name is already registered");
                	// }
                	else if(res.eventid == 1){
                		showValidate(input[res.eventid]);
                		$('#emailvalidate').attr('data-validate', "This email is already registered.");
                	}
                }
                else{
                	window.location = "http://localhost/mimo/accounts/step2";
                }
            },
            error: function(e){
                console.log(e);            
            }

        });
		}
        
    });
</script>
</body>
</html>