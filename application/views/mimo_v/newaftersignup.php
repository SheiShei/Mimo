
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
				<button type="button" class="close reset" 
						data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
					</button>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-25" style="font-size:28px; text-align: left;">
						Choose a stagename
					</span>
					<span class="login100-form-title p-b-49" style="font-size:18px; text-align: left; color:#A9A9A9;">
						Don’t worry, you can always change it later.
					</span>

					<div id="uservalidate" class="wrap-input100 validate-input m-b-23" data-validate = "Choose a stagename">
						<span class="label-input100">Stage name</span>
						<input class="input100" type="text" name="username" placeholder="Type your stagename">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="next" class="login100-form-btn">
								Next
							</button>
						</div>
					</div>
					<div class="text-center p-t-115">
						<a class="txt1" href="<?php echo base_url('');?>">
							Skip
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
	$('#next').click(function(e) {
        e.preventDefault();
        var user = $("input[name='username']").val();
        count=0;
        
        for(var i=0; i<input.length; i++) {
        	if($(input[i]).attr('name') == 'username') {
	        		if($(input[i]).val().trim().match(/^[a-zA-Z0-9_]*$/) == null){
	        			showValidate(input[i]);
	        			$('#uservalidate').attr('data-validate', "Only use letters, numbers and '_'.");
	        			count++;
	        		}
	        		else if($(input[i]).val().trim() == ''){
	        			showValidate(input[i]);
	        			$('#uservalidate').attr('data-validate', "Choose a stagename.");
	        			count++;
	        		}
	        }
        }

        if(count==0){
	        $.ajax({
	            type: 'post',
	            url: '<?php echo base_url() ?>accounts/after',
	            data:{
	                username:user,
	            },
	            success: function(response){
	                var res = JSON.parse(response)
	                if(res.status=='stop'){
	                	showValidate(input[0]);
	                	$('#uservalidate').attr('data-validate', "Stage Name is already registered");
	                }
	                else{
	                	window.location = "http://localhost/mimo/";
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