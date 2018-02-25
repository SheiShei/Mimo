<body style="background-color: #1a1a1a">

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#"><strong>MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
			 <form class="navbar-form navbar-left">
                    <div class="input-group">
						<!--Search Bar -->
                        <input class="form-control searchbar" type="text" placeholder="Search">
                        <div class="input-group-btn">
                            <a class="btn btn-default btn-block" role="button" href="#"> <i class="glyphicon glyphicon-search"></i></a>
                        </div>
                    </div>
                </form>
				<!-- Nav Items -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#"><i class="material-icons">speaker</i>Music Hall</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="material-icons">equalizer</i>Browse <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#"><i class="material-icons">person</i>Artist </a></li>
                            <li role="presentation"><a href="#"><i class="material-icons">music_note</i>Genre </a></li>
                            <li role="presentation"><a href="#"><i class="material-icons">show_chart</i>Chart </a></li>
                        </ul>
                    </li>
					 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="material-icons">file_upload</i>Release <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="" data-toggle="modal" data-target="#addThought"><i class="material-icons">comments</i> Thoughts</a></li>
                            <li role="presentation"><a href="#"><i class="material-icons">music_note</i> Audio</a></li>
						</ul>
                    <li role="presentation"><a href="#"><i class="material-icons">headset_mic</i>My Studio</a></li>	
					 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="material-icons">settings</i> <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
								<a href="/Mimo/settings">Account Settings</a></li>
                            <li role="presentation"><a href="#">Logout</a></li>
						</ul>
                </ul>
            </div>
        </div>
    </nav>

</br> </br>
<div class="container ">
<div class="margin">
	<h3 class="txt">Featured Charts</h3>
</div>

<div class="row text-center">
	<div class="col-md-3 " >
		<div >
			<!--both a href link papunta sa playlist-->
			<div><a href="/Mimo/playlist" ><img src="http://localhost/mimo/assets/img/top_gb.jpg" class="img-rounded img-chart "></a></div>			
			<div><strong><a href="/Mimo/playlist" class="txt ">Global Top 50</a></strong></div>	
			<div><p class="p hidden-xs"> Your daily update of the most played tracks right now. </br>PLAYLIST . BY SPOTIFY </p></div>	
		</div>
	</div>
	
	
	<div class="col-md-3 " >
		<div>
		<!--both a href link papunta sa playlist-->
			<div><a href="/Mimo/playlist"><img src="http://localhost/mimo/assets/img/top_ph.jpg" class="img-rounded img-chart "></a></div>				
			<div><strong><a href="/Mimo/playlist" class="txt ">Philippines Top 50</a></strong></div>	
			<div><p class="p hidden-xs"> Your daily update of the most played tracks in the Philippines right now. </br>PLAYLIST . BY SPOTIFY</p></div>	
		</div>
	</div>
	
	<div class="col-md-3 " >
		<div>
			<!--both a href link papunta sa playlist-->
			<div><a href="/Mimo/playlist"><img src="http://localhost/mimo/assets/img/vir_ph.jpg" class="img-rounded img-chart "></a></div>					
			<div><strong><a href="/Mimo/playlist" class="txt">Philippines Viral 50</a></strong></div>	
			<div><p class="p hidden-xs"> Your daily update of the most viral tracks in the Philippines.</br> PLAYLIST . BY SPOTIFY </p></div>	
		</div>
	</div>
	
	<div class="col-md-3 " >
		<div>
			<!--both a href link papunta sa playlist-->
			<div><a href="/Mimo/playlist"><img src="http://localhost/mimo/assets/img/vir_gl.jpg" class="img-rounded img-chart "></a></div>				
			<div><strong><a href="/Mimo/playlist" class="txt">Global Viral 50</a></strong></div>
			<div><p class="p hidden-xs"> Your daily update of the most viral tracks in the world. </br>PLAYLIST . BY SPOTIFY  </p></div>
		</div>
	</div>
	
	</div>
	<!--end of first row-->
	
	<!--second row-->
	</br>
	<div class="row text-center">
	<div class="col-md-6">
		<div>
			<!--a href link papunta sa playlist-->
			<a href="/Mimo/playlist"><img src="http://localhost/mimo/assets/img/top_cn.jpg" class="img-rounded img-banner"></a>				
			
		</div>
	</div>
	
	
	<div class="col-md-6">
		<div><!--a href link papunta sa playlist-->
			<a href="/Mimo/playlist"><img src="http://localhost/mimo/assets/img/vir_cn.jpg" class="img-rounded img-banner"></a>				
			
		</div>
	</div>
	
	
	
	</div>
	<!--end of second row-->
</div>	
	</body>