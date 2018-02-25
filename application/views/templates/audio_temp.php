	<!-- Post Header -->
	<div class="posttemp">
		<div class="posthead">
			<div class="media">
				<div class="media-left">
					<a href="#" >
						<div class="media-object postPic" style="background-image:url('http://localhost/mimo/assets/img/bts.jpg');"></div>
					</a>
				</div>

				<div class="media-body">
					<h4 class="media-heading"><a class="user">BLACKPINK</a><small> released an audio!</small>
					<a class="btn del pull-right">
						<span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span>
						</a>
					<!--REPORT-->
					<a class="btn del pull-right">
						<span class="fa fa-exclamation-circle" title="Report this Post!"></span></a>
					<!---->
					<br />
					<small><small> 12:20 AM 2/3/2017</small></small><small></small>
					
					</h4>
				</div>
			</div>
		</div>
			
		<!--Post Body -->
		<div class="postbodyaudio">
			<div class="media">
				<div class="media-left">
					<a href="#" >
						<div class="media-object albumCover" style="background-image:url('http://localhost/mimo/assets/img/bp.jpg');"></div>
							</a>
				</div>
				
				<div class="media-body ">
						<h4 style="color: black" class="media-heading"><i class="fa fa-music"></i><b style="color: #ff9926"> Title:</b> Audio Title Here</h4>
						<h6 style="padding: 5px 2.2em"><b> Artist:</b> artisthere</h6>
						<h6 style="padding: 0 2.2em"><b> Genre:</b> Alternatives</h6>
						<h6 style="padding: 0 2.2em"><b> Year:</b> 2017</h6>
						<p id="audDesc" style="padding: 0 2.2em">This song is dedicated to all of you. Listen to it feel my love.</p>
						<hr />
				</div>	
			</div>
					
			<div class="row" >
				<div class="col-md-12">
					<audio id="audio" controls controlsList="nodownload" width="100%">
						<source src="http://localhost/mimo/assets/audios/sample.mp3" type="audio/mpeg">
								Your browser does not support the audio element.
					</audio>
				</div>
			</div>
					
			<div id="likesectionaud">
				<div class="btn-grp btn-group-justified">
					<a href="#" id="likeBtn" type="button" class="btn like" >
						<!-- Like -->
						<span class="fa fa-heart-o" data-toggle="tooltip" data-placement="top" title="Like">
						</span> <small><small>(127,343)</small></small></a>
						
						<!--Comment -->
						<a id="commentBtn" class="btn comment" data-toggle="modal" data-target="#commentModal">
						<span class="fa fa-commenting-o" data-toggle="tooltip" data-placement="top" title="Comment"></span>
						<small><small>(873)</small></small></a>
						
						<a class="btn view disabled">
						<span class="glyphicon glyphicon-play "></span>
						<small>1,364</small>
						</a>
						
						<a id="addCollect" class="btn comment" data-toggle="modal" data-target="#collectModal"> 
						<span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a>
						
				</div>
			</div>	
		</div>
		<?php $this->load->view('templates/colmodal');?>
		<?php $this->load->view('templates/commentModal');?>
	</div>
	<script>
	var v = document.getElementsByTagName("audio")[0];
	var view = 1;
		v.addEventListener("ended", function() { 
			view = view+1;
			alert('Audio has been viewed! Views: '+view); 
		}, true);
	</script>
			