<html>
<head>
	<title> Trial</title>
</head>
<style>
	#playlist{
		list-style:none;
	}
	#playlist li a{
		color:black;
		text-decoration:none;
		font-size:15px;
	}
	#playlist .current-song a{
		color:blue;
	}
	.margin{ 
	 padding-top: 50px; 
	
 } 
 
 #plays li{
		color:black;
		text-decoration:none;
	}
	.position{
		margin-top:1.5%;
		margin-left:-200%;
	}
.up{
	padding-top:2%;
	
}
.he{
	font-weight:bold;
}




 
 
	
</style>
<body style="background-color: #e1e1e1">

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="<?php echo base_url('');?>">
				<?php $this->load->view('include/mimologo')?>
				<strong style="margin-top: -5px;">MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
			 <form class="navbar-form navbar-left">
                    <div class="input-group">
						<!--Search Bar -->
                        <input class="form-control searchbar" type="text" placeholder="Search">
                        <div class="input-group-btn">
                            <a class="btn btn-block searchBtn" role="button" href="#"> <i class="glyphicon glyphicon-search"></i></a>
                        </div>
                    </div>
                </form>
				<!-- Nav Items -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#" class="bar">
						<i class="material-icons bar">speaker</i><p class="bar hidden-sm"> Music Hall</p></a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" class="bar">
						<i class="material-icons bar">equalizer</i><p class="hidden-sm bar"> Browse</p><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li role="presentation"><a href="<?php echo base_url('mimo/artist');?>"><i class="material-icons">person</i> Artist</a></li>
								<li role="presentation"><a href="<?php echo base_url('mimo/genre');?>"><i class="material-icons">music_note</i>Genre </a></li>
								<li role="presentation"><a href="<?php echo base_url('mimo/charts');?>"><i class="material-icons">show_chart</i>Chart </a></li>
							</ul>
                    </li>
					 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" class="bar">
						<i class="material-icons bar">file_upload</i><p class="hidden-sm bar"> Release</p><span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="" data-toggle="modal" data-target="#addThought"><i class="material-icons">comments</i> Thoughts</a></li>
                            <li role="presentation"><a href="" data-toggle="modal" data-target="#addAudio"><i class="material-icons">music_note</i> Audio</a></li>
						</ul>
                    <li role="presentation"><a href="<?php echo base_url('myStudio');?>" class="bar">
						<i class="material-icons bar">headset_mic</i><p class="hidden-sm bar">My Studio</p></a></li>	
					 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" class="bar">
						<i class="material-icons">settings</i> <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                     <li role="presentation">
							        	<a href="<?php echo base_url('mimo/settings');?>">Account Settings</a></li>
                            <li role="presentation"><a href="?a=logout">Logout</a></li>

						</ul>
                </ul>
            </div>
        </div>
    </nav>

</br> </br>
<div class="container">
	<div class="margin">
		<div class="col-md-12 col-xs-12" >
	
			<div style="float:right" class="position"><audio src="" controls id="audioPlayer" class="position">
				Sorry, your browser doesn't support html5!</audio>
			</div>
			<div><h2 >Chart</h2></div>
			<div class="pre-scrollable mobile" style="padding-top:2%; max-height:500px; ">
				<div class="col-md-4  col-xs-4 try" style="text-center">
			
					<ul id="playlist">
			
					<h5 class="he ">Title</h5>
			
						<li class="current-song"><a href="http://localhost/mimo/assets/audios/Kalimba.mp3"> Kalimba</a></li>
						<li class="up"> <a href="http://localhost/mimo/assets/audios/Maid.mp3">Maid</a></li>
						<li class="up"> <a href="http://localhost/mimo/assets/audios/Piano.mp3">Piano</a></li>
						<li class="up"> <a href="http://localhost/mimo/assets/audios/sample.mp3">Sample</a></li>
						<li class="up"> <a href="http://localhost/mimo/assets/audios/Sleep.mp3">Sleep</a></li>
					</ul>
				</div>
				
				<div class="col-md-4 col-xs-4 tsk" >
	
					<ul >
					<div><h5 class="he">Artist</h5></div>
						<li >Dua  Lipa</li>
						<li class="up" > Sam Smith</li>
						<li class="up"> Camila Cabello</li>
						<li class="up"> 21 Savage</li>
						<li class="up ">Khalid</li>
	
					</ul>
				</div>
	
				<div class="col-md-4 col-xs-4 grr" >
	
					<ul >
					<div><h5 class="he ">Daily Plays</h5></div>
						<div><li class="hidden-xs" >1234</li>
						<button type="button" class="btn visible-xs" style="background: transparent" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="" data-content="Daily Plays">
						<span class="glyphicon glyphicon-option-vertical " aria-hidden="true"> </span> </button>
						</div>
						<div>
						<li class="up hidden-xs " > 12345</li>
						<button type="button " class="btn visible-xs" style="background: transparent" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="" data-content="Daily Plays">
						<span class="glyphicon glyphicon-option-vertical " aria-hidden="true"> </span> </button>
						</div>
						<div>
						<li class="up hidden-xs "> 12345</li>
						<button type="button" class="btn visible-xs" style="background: transparent" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="" data-content="Daily Plays">
						<span class="glyphicon glyphicon-option-vertical " aria-hidden="true"> </span> </button>
						</div>
						<div>
						<li class="up hidden-xs"> 12345</li>
						<button type="button" class="btn visible-xs" style="background: transparent" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="" data-content="Daily Plays">
						<span class="glyphicon glyphicon-option-vertical " aria-hidden="true"> </span> </button>
						</div>
						<div>
						<li class="up hidden-xs">1234</li>
						<button type="button" class="btn visible-xs" style="background: transparent" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="" data-content="Daily Plays">
						<span class="glyphicon glyphicon-option-vertical " aria-hidden="true"> </span> </button>
						</div>
	
					</ul>
				</div>
			</div>
	
		</div>
	</div>
</div>		
</div>
</body>
<script  src="https://localhost/mimo/assets/js/jquery.min.js"></script>
		<script>
			audioPlayer();
			function audioPlayer(){
				
				var currentSong = 0;
				$("#audioPlayer")[0].src = $("#playlist li a")[0];
				/*$("#audioPlayer")[0].play();*/
				$("#playlist li a").click(function(e){
					e.preventDefault();
					$("#audioPlayer")[0].src = this;
					$("#audioPlayer")[0].play();
					$("#playlist li").removeClass("current-song");
						currentSong = $(this).parent().index();
						$(this).parent().addClass("current-song");
				});
				
				$("#audioPlayer")[0].addEventListener("ended",function(){
					currentSong++;
					$("#playlist li").removeClass("current-song");
					$("#playlist li:eq("+currentSong+")").addClass("current-song");
					$("#audioPlayer")[0].src = $("#playlist li a")[currentSong].href;
					$("#audioPlayer")[0].play();
				});
				
				
			}
			
			
 

		</script>
		

</html>