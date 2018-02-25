
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/main.css">

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="<?php echo base_url('');?>">
                <?php $this->load->view('include/mimologo')?>
                <strong style=" font-family: Kristen ITC;">MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
    </nav>
	<div class="limiter" style="background-color: white">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div id="uservalidate" class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
						<span class="label-input100">Stage name</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Wrong password">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="http://localhost/mimo/accounts/forgot_password">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="signin" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Sign Up Using
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
							Don’t have an account?
						</span>

						<a class="txt2" href="<?php echo base_url('accounts');?>">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="http://localhost/mimo/assets/js/main.js"></script>

<script type="text/javascript">
function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }
var input = $('.validate-input .input100');
	$('#signin').click(function(e) {
        e.preventDefault();
        var user = $("input[name='username']").val();
        var pass = $("input[name='pass']").val();
        count=0;
        for(var i=0; i<input.length; i++) {
        	if(($(input[i]).val().trim() == '')){
            	showValidate(input[i]);
            	$('#uservalidate').attr('data-validate', "Username is required");
            	count++;
            }
        }

        if(count==0){
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>accounts/si',
            data:{
                username:user,
                password:pass,
            },
            success: function(response){
                var res = JSON.parse(response)
                console.log(res);
                if(res.status != "success"){
                	if(res.eventid == 0){
                		$('#uservalidate').attr('data-validate', "The Stage Name you entered doesn't match any account");
                		showValidate(input[0]);
                   	}
                	else if(res.eventid == 1){
                		
                		showValidate(input[1]);
                	}
                }
                else{
                    window.location = "http://localhost/mimo";
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