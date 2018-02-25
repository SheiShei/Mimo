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
					<h4 class="media-heading"><a class="user">BTS</a><small> shared a video!</small>
				
					<a class="btn del pull-right">
						<span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span>
						</a>
					<!--REPORT-->
					<a class="btn del pull-right">
						<span class="fa fa-exclamation-circle" title="Report this Post!"></span></a>
					<!---->
					<br />
					<small><small> 12:20 AM 2/3/2017</small></small>
					</h4>
				</div>	
			</div>
		</div>
			
		<!--Post Body -->
		<div class="postbodyaudio">
			<h5 class="media-heading text-center"><i class="fa fa-video-camera"></i> BTS - Serendipity (Comeback Teaser)</h5>
			<div class="row" >
				<div class="col-md-12">
					<video src="http://localhost/mimo/assets/videos/serendipity.mp4" style="width:100%; height: 250px" controls controlsList="nodownload">
					</video>
				</div>
			</div>
			
			<h6 style="color: #1e1e1e">This is BTS (방탄소년단)'s September comeback teaser with the song "Serendipity" sung by Jimin.</h6>
			<br />
			<div id="likesectionaud">
				<div class="btn-grp btn-group-justified">
						<a href="#" id="likeBtn" type="button" class="btn like">
						<!-- Like -->
						<span class="fa fa-heart-o"></span> 
						<small><small>(127,343)</small></small></a>
						
						
						<!--Comment -->
						<a id="commentBtn" class="btn comment" data-toggle="modal" data-target="#commentModal">
						<span class="fa fa-commenting-o"></span>
						<small><small>(873)</small></small></a>
	
						<!--<a href="">
						<span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span> <small>Delete</small>
						</a>-->
						
						<a class="btn view disabled">
						<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span>
						<small> 123,234</small>
						</a>
				
				</div>
				</div>	
		</div>
		<?php $this->load->view('templates/commentModal');?>
	</div>
	<script>
	var v = document.getElementsByTagName("video")[0];
	var view = 1;
		v.addEventListener("ended", function() { 
			view = view+1;
			alert('Video has been viewed! Views: '+view); 
		}, true);
	</script>