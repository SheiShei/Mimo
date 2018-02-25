
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
			<div class="wrap-login100 p-l-55 p-r-55 p-t-0 p-b-54">
				<form id="form"class="login100-form validate-form" method="post" action="http://localhost/mimo/accounts/reset_success">
					<span class="login100-form-title p-b-25" style="font-size:28px;">
						Change your password
					</span>
					<span class="login100-form-title p-b-49" style="font-size:15px; color:#A9A9A9;">
						Choose a strong, unique password.
					</span>

					<div id="uservalidate" class="wrap-input100 validate-input m-b-23" data-validate="">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your new password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div id="passvalidate" class="wrap-input100 validate-input m-b-23" data-validate="">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="rpass" placeholder="Repeat password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-left p-t-8 p-b-31">
						<input type="checkbox" id="cbox" name="cbox" />
                        <label for="cbox">Sign me out in all devices</label>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="signin" class="login100-form-btn">
								Reset password
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="http://localhost/mimo/assets/js/main.js"></script>

<script type="text/javascript">
$('#cbox').prop('checked', true);
function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }
var input = $('.validate-input .input100');
	$('#signin').click(function(e) {
        e.preventDefault();
        var count=0;
        var token = '<?php echo $token; ?>'
        var pass = $("input[name='pass']").val();
        var rpass = $("input[name='rpass']").val();
        var cbox
        if ($('#cbox').prop('checked')) {
            cbox = 'true'
        }
        else{
            cbox = 'false'
        }
        	if(($(input[0]).val().trim() == '') || $(input[0]).val().trim().match(/^(?=.*\d)(?=.*[a-z]).{8,160}$/) == null){
            	showValidate(input[0]);
            	$('#uservalidate').attr('data-validate', "Use at least one letter, one numeral, and eight characters.");
            	count++;
            }

        if(count==0){
	        $.ajax({
	            type: 'post',
	            url: '<?php echo base_url() ?>accounts/reset',
	            data:{
	                rpass:rpass,
	                pass:pass,
	                cbox:cbox,
	                token:token,
	            },
	            success: function(response){
	                var res = JSON.parse(response)
	                console.log(res);
	                if(res.status != "success"){
	                	showValidate(input[1]);
            			$('#passvalidate').attr('data-validate', "Password don't match.");
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