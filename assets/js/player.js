
var mytrack=document.getElementById('mytrack');


playBtn.addEventListener('click',playOrPause, false);

//play or pause (working)
function playOrPause(){
	var playBtn=document.getElementById('playButton');
	
	if(!mytrack.paused && !mytrack.ended){
			mytrack.pause();
			playBtn.src = "/img/play.jpg";
	}
	else  {
		mytrack.play();
		playBtn.src = '../img/pause.jpg';
	}	
	
}

//mute unmute song (working)
function muteOrUnmute(){
	var muteBtn=document.getElementById('soundButton');
	
	if(mytrack.muted== true){
			mytrack.muted=false;
			
	}
	else  {
		mytrack.muted=true;
		alert(mytrack.muted);
	}	
	
}
//repeat of the song (working)
function repeat(){
	var repeatBtn=document.getElementById('repeatButton');
	
	if(mytrack.loop == false){
		mytrack.loop = true;
		mytrack.play();
	}
	else if (mytrack.loop == true){
		mytrack.loop = false;
		
		
	}	
	
}

function playNext() {
    var selected = _playlist.querySelector("li.selected");
	
    if (selected && selected.nextElementSibling) {
        playlistItemClick(selected.nextElementSibling);
    }
}

function update(){
	
	
	if(!mytrack.ended){
		var playedMinutes=parseInt(mytrack.currentTime/60);
		var playedSeconds=parseInt(mytrack.current%60);
		currentTime.innerHTML=playedMinutes + ':' +playedSeconds;
	}
	else{
		currentTime.innerHTML="0.00";
		playButton.style.backgroundImage='url(../images/play.png)';
		
		
	}	
	
}


