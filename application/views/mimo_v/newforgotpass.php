
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/mimo/assets/css/main.css">

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#">
                <?php $this->load->view('include/mimologo')?>
                <strong style=" font-family: Kristen ITC;">MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
    </nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form id="form" class="login100-form validate-form" method="post" action="http://localhost/mimo/accounts/password_sent">
					<span class="login100-form-title p-b-25" style="font-size:28px; text-align: left;">
						Reset your password
					</span>
					<span class="login100-form-title p-b-49" style="font-size:15px;text-align: left; color:#A9A9A9;">
						Enter your email address and we will send you a link to reset your password.
					</span>

					<div id="uservalidate" class="wrap-input100 validate-input m-b-23" data-validate = "">
						<span class="label-input100">Email</span>
						<input class="input100" type="name" name="email" placeholder="you@example.com">
						<span class="focus-input100" data-symbol="&#xf159;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="next" class="login100-form-btn">
								reset password
							</button>
						</div>
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
	$('#next').click(function(e) {
        e.preventDefault();
        var email = $("input[name='email']").val();
        count=0;
        
        for(var i=0; i<input.length; i++) {
        	if($(input[i]).attr('name') == 'email') {
	        		if($(input[i]).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null){
	        			showValidate(input[i]);
	        			$('#uservalidate').attr('data-validate', "Please enter a valid email..");
	        			count++;
	        		}
	        }
        }

        if(count==0){
	        $.ajax({
	            type: 'post',
	            url: '<?php echo base_url() ?>accounts/email',
	            data:{
	                email:email,
	            },
	            success: function(response){
	                var res = JSON.parse(response)
	                if(res.status=='stop'){
	                	showValidate(input[0]);
	                	$('#uservalidate').attr('data-validate', "The email you entered doesn't match any account");
	                }
	                else{
	                	e.preventDefault();
	                	$("#form").submit();
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