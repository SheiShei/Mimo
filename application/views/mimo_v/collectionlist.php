<link rel="stylesheet" href="https://cdn.plyr.io/2.0.13/plyr.css">
<script src="https://api.html5media.info/1.1.8/html5media.min.js" type="text/javascript" ></script>
<script src="https://cdn.plyr.io/2.0.13/plyr.js" type="text/javascript" ></script>
<style>
.add-bottom { margin-bottom:2rem !important; }
.left { float:left; }
.right { float:right; }
.center { text-align:center; }

#mainwrap {}

#audiowrap,
#plwrap {
margin:0 auto;
padding:10px;
}

#tracks {
position:relative;
text-align:center;
}

#nowPlay {
display:inline;
font-size: 17px;
}

#npAction {
padding:15px;
position:absolute;
}

#npTitle {
padding:15px;
font-size: 19px;
}

#plList li {
cursor:pointer;
display:block;
margin:0 10px;
padding:10px 0;
}

#plList{
	padding: 5px;
}
#plList li:hover {
background-color:rgba(255,255,255,.1);
}

.plItem {
position:relative;
}

.plTitle {
left: auto;
overflow:hidden;
position:absolute;
text-overflow:ellipsis;
top:0;
white-space:nowrap;
}

.plNum {
padding-left:21px;
width:20%;
}

.plArtist {
padding-left:10px;
position:absolute;
overflow:hidden;
left:50%;
top:0;
}

.plGenre {
padding-left:10px;
position:absolute;
left:70%;
top:0;
}

.plYear {
padding-left:10px;
position:absolute;
left:90%;
top:0;
}

.plSel,
.plSel:hover {
background-color:rgba(255,255,255,.2);
color:#fff;
cursor:default !important;
}

a[id^="btn"] {
border-radius:3px;
color:#fff;
cursor:pointer;
display:inline-block;
font-size:2rem;
height:35px;
line-height:.8;
margin:0 20px 20px;
padding:10px;
text-decoration:none;
transition:background .3s ease;
width:35px;
}

a[id^="btn"]:last-child {
margin-left:-4px;
}

a[id^="btn"]:hover,
a[id^="btn"]:active {
background-color:rgba(0,0,0,.1);
color:#fff;
}

a[id^="btn"]::-moz-focus-inner {
border:0;
padding:0;
}

.plyr--audio .plyr__controls {
background-color:transparent;
border:none;
color:#fff;
padding:20px 20px 20px 13px;
width:100%;
}

.plyr--audio .plyr__controls button.tab-focus:focus,
.plyr--audio .plyr__controls button:hover,
.plyr__play-large {
background:rgba(255,255,255,.2);
}

.plyr__progress--played, .plyr__volume--display {
color:rgb(255, 166, 77);
}

.plyr--audio .plyr__progress--buffer,
.plyr--audio .plyr__volume--display {
background:rgba(255,255,255,.1);
}

.plyr--audio .plyr__progress--buffer {
color:rgba(255,255,255,.2);
}

@media only screen and (max-width:850px) {
    #nowPlay { display:none; }
}
</style>
<!--Dito ko na lang nilagay yung styles at script kasi nasisira kapag nilagay ko sa header eh-->


<body style="-webkit-text-size-adjust:100%; background-image: url('http://localhost/mimo/assets/img/makemusic.jpg'); background-attachment: fixed; background-size: cover;
background-position: center right; color:#fff;">

<div class="container belowtn" style="padding-top: 15px; min-height: 100%; background-color: rgba(0,0,0,0.6);">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"><span class="fa fa-list"></span>&nbsp;&nbsp;<?php echo $name ?>
			</h3>
			<span><a style="color: white" class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" ><i class="fa fa-chevron-down"></i></a>
				<ul class="dropdown-menu" style="position:inline;">
                    <?php foreach ($colist as $c) { ?>
                     <li><a href="http://localhost/mimo/mimo/collectionlist?name=<?php echo $c['id']; ?>"><?php echo $c['name']; ?></a></li>
                     <?php } 
                     $lists = $this->getposts->getcolsong($id);
                     $res = array();
                     $i=0;
                     foreach ($lists as $l) {
                        $i++;
                        $con = array('id'=>$l['user_id']);
                        $username = $this->get->read('users',$con,'username')[0]['username'];
                        $phpdate = strtotime( $l['posted_at'] );
                        $p=array(

                                'track'=>$i,
                                'name'=>$l['title'],
                                'artist'=>$username,
                                'genre'=>$l['genre'],
                                'year'=>date( 'Y', $phpdate ),
                                'cover'=>$l['cover'],
                                'file'=>$l['path']
                            );
                        array_push($res,$p);
                     }
                     $res = json_encode($res);
                     ?>
					</ul></span>
                    
		</div>
	</div>
    <div class="add-bottom">
        <div id="mainwrap">
            <div id="nowPlay">
                <span class="left" id="npAction">Paused...</span>
                <span class="right" id="npTitle"></span>
            </div>
            <div id="audiowrap">
                <div id="audio0">
                    <audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
                </div>
                <div id="tracks">
                    <a id="btnPrev"><small><span class="fa fa-step-backward"></span></small></a>
                    <a id="btnNext"><small><span class="fa fa-step-forward"></span></small></a>
                </div>
            </div>
            <div id="plwrap">
                <ul id="plList"></ul>
            </div>
        </div>
    </div>
</div>
</body>
<script>
jQuery(function ($) {
    'use strict'
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false,
            // mediaPath = 'http://localhost/mimo/assets/audios/',
            // extension = '',
            tracks = <?php echo $res; ?>,
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackArtist = value.artist,
                    trackGenre = value.genre,
                    trackYear = value.year,
                    trackCover = value.cover;
                   
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                } else {
                    trackNumber = '' + trackNumber;
                }
                $('#plList').append('<li><div class="plItem"><div class="plNum"><img src="'+ trackCover +'" style="width:30px; height:30px" class="hidden-xs" />&nbsp;&nbsp;' + trackNumber + '.&nbsp;&nbsp;' + trackName + '</div><div class="plArtist hidden-xs"><small><span class="glyphicon glyphicon-user"></span>&nbsp;' + trackArtist + '</small></div><div class="plGenre hidden-xs"><small><span class="fa fa-music"></span>&nbsp;'+ trackGenre+' </small></div><div class="plYear hidden-xs"><small><span class="fa fa-clock-o"></span>&nbsp;'+ trackYear +' </small></div></div></li>');
            }),
            trackCount = tracks.length,
            npAction = $('#npAction'),
            npTitle = $('#npTitle'),
            audio = $('#audio1').bind('play', function () {
                playing = true;
                npAction.text('Now Playing...');
            }).bind('pause', function () {
                playing = false;
                npAction.text('Paused...');
            }).bind('ended', function () {
                npAction.text('Paused...');
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),
            btnPrev = $('#btnPrev').click(function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').click(function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            li = $('#plList li').click(function () {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
            loadTrack = function (id) {
                $('.plSel').removeClass('plSel');
                $('#plList li:eq(' + id + ')').addClass('plSel');
                npTitle.text(tracks[id].name);
                index = id;
                audio.src = tracks[id].file;
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
        loadTrack(index);
    }
});

//initialize plyr
plyr.setup($('#audio1'), {});
</script>
</html>
