<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Audio Player</title>
 
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/mimo/assets/css/player.css">
	
  
  
     

  
</head>

<body >
<div class="container-fluid">
	<div id= "wrapper" >
		
		<audio id="mytrack" controls>
			<source src="http://localhost/mimo/assets/audios/HappierPianoCover.mp3" type="audio/mp3" /> 
		</audio>
			<div id="defaultBar">
				<div id="progressBar"></div>
			</div>
		<nav >
			<!--left buttons  -->
			<div class="row hidden-xs hidden-sm nav" >
				<div class="col-xs-3">
					
					<div id="buttons" >
						<button type="button" id="backwardButton" > </button>
						<button type="button" id="playButton" onclick="playOrPause()"></button>
						<button type="button" id="nextButton" ></button>
						<button type="button" id="randomButton"> </button>
						<button type="button" id="repeatButton" onclick="repeat()"></button>
						<!--
						<span id="currentTime">0:00</span>
						<span id="fullDuration">0:00</span>
						-->
					</div>
				</div>
				<!-- div class="col-xs-6"-->
				
				
				<!--right buttons -->
				<div class="col-xs-3 col-xs-offset-6 fave">
					<button type="button" id="soundButton" onclick="muteOrUnmute()"></button>
				
					<a href="#"><img src="http://localhost/mimo/assets/img/gucci.jpg" class="img-rounded img-chart " style="margin-top: -25px;"></a>			
					<span class="text">
						<div class="artist">
						<p> Gucci Mane </p>
						</div>
					</span>
					
					<button type="button" id="favoriteButton" > </button>
					<button type="button" id="playlistButton" > </button>
					
				</div>
			</div>
			
			<!--buttons for phones and tablets only -->
			<div class="row nav hidden-lg">
				<div class="col-xs-12">
					<div class="buttons">
						<button type="button" id="backwardButton" > </button>
						<button type="button" id="playButton" onclick="playOrPause()"></button>
						<button type="button" id="nextButton"></button>
						<button type="button" id="randomButton"> </button>
						<button type="button" id="repeatButton" onclick="repeat()"></button>
						<a href="#" class="album"><img src="http://localhost/mimo/assets/img/gucci.jpg" class="img-rounded img-chart album"></a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

	<script type="text/javascript" src="http://localhost/mimo/assets/js/player.js"></script>
</body>
</html>