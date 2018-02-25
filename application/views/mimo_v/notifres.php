<body style="background-color: #d9d9d9">

	<!--This is below Top Navigation Section -->
<div class="container">
	<!-- Left Nav Section -->
<div class="row">
		<div id="leftnav" class="col-md-3 col-sm-5">
		
			<!-- Left Nav Profile Section -->
			<div class="row" style="margin-left: 10px; margin-right: 10px">
				<!-- Header -->
					<!-- Sa 'background-image: url('') mo ilagay yung mga header at profile pic -->
				<div class="header" style="background-image:url('<?php if ($users[0]['header'] == NULL){ echo 'http://localhost/mimo/assets/img/grey-background.png'; }
																else{ echo $users[0]['header'];} ?>'); width: 100%; height: 170px;
									margin-left: 0px; background-size: cover;">
					<!--DP-->
					<div class="nameBox" style="background: linear-gradient(transparent,rgba(0,0,0,0.2),rgba(0,0,0,0.7)); 
												background-size: cover; margin: 0 0; height: 162px">
						<div class="dpSection media" style="background-image:url('<?php if ($users[0]['picture'] == NULL){ echo 'http://localhost/mimo/assets/img/noimage.jpg'; }
																else{ echo $users[0]['picture'];} ?>');"></div>
							
						
						<!-- Full name yung sa h4 at username/stagename yung sa h6 -->
						<h4 style="color: white" class="text-center user"><?php echo $users[0]['fullname'];?></h4>
						<a href="http://localhost/mimo/myStudio?username=<?php echo $users[0]['username'];?> " style="color: white" class="text-center user"><h6><?php echo $users[0]['username'];?></h6></a>
						</div>
				</div>
			
			</div>
			
			<!-- End of Left Nav Profile Section -->

			<div class="row" style="margin-left: 10px; margin-right: 10px">
					<div id="listNav" class="col-md-12">
						<div class="btn-group btn-group-justified">
						<a  href="" class="listnav btn btn-group">
						<i class="material-icons">library_music</i>
						<p><small>Collection</small></p>
						</a>
			
						<a  href="" class="listnav btn btn-group">
						<i class="material-icons">album</i>
						<p><small>Audios</small></p>
						</a>
					
						<a  href="" class="listnav btn btn-group">
						<i class="material-icons">videocam</i>
						<p><small>Videos</small></p>
						</a>
		
					</div>
				</div>
			</div>
			
			
			<!--MP3 Player Section-->
		
			
			<!-- MP3 Player Section-->
			
			
			
			
			
		</div>
		<!--End of Left Nav Section -->
			<!--MP3 Player Section-->
			<!-- MP3 Player Section-->
		
		
	<!-- Content Section -->
	
	<!-- Post Body (Thoughts) -->
	<div class="col-md-6 belowtn col-xs-12 col-sm-7">
		<?php $this->load->view('templates/commentModal');?>
		<div class="postcont">

		</div>
	</div>
	
	
<!-- Third Column Div (Beside Contents)-->
	<div class="col-md-3">
	<br /> <br /> <br />
	
	<!--DONT MIND MUNA TONG AUDIO PLAYER-->
	<!--<div class="row hidden-sm hidden-xs" id="audplayer">
				<div class="col-md-12">
				<div class="wrapper">
					<div class="music music-cover">
						<img src="http://localhost/mimo/assets/img/bp.jpg" alt="" class="cover-img" />
					</div>
					
					<div class="music album-controls">
						<img src="http://localhost/mimo/assets/img/bp.jpg" alt="" class="album-img" />
							<div class="album-info">
								<span class="song-title">Track Title<span>
								<span class="album-artist">Singer</span>
								<span class="album-artist">Album: Into The Pink</span>
								<span class="song-utility">
									<i class="fa fa-home" aria-hidden="true"></i>
									<i class="fa fa-random" aria-hidden="true"></i>
									<i class="fa fa-retweet" aria-hidden="true"></i>
									<i class="fa fa-clock-o" aria-hidden="true"></i>
								</span>
							</div>
					</div>

					<div class="music music-controls">
						<span class="seek-bar">
							<span class="knot"></span>
						</span>
						<span class="song-buffer"></span>
						<span class="song-current-time">00:00</span><span class="play">
							<i class="fa fa-play" aria-hidden="false"></i>
							<span class="song-duration">00:00</span>
						</span>
					</div>
				
				</div>
			</div>
			</div>
	
			<audio controls id="music-player" preload="auto" >
				<source src="http://localhost/mimo/assets/audios/sample.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
			</audio>
			
			
		
	<!-- Para sa POST AND AUDIO MODAL-->
	<?php $this->load->view('templates/addpostmodal');?>
	<?php $this->load->view('templates/addaudiomodal');?>
	<?php $this->load->view('templates/addvideomodal');?>
	
		<!--Para naman to dun sa fixed button ng release ng thoughts at audio-->
		<?php $this->load->view('include/releasebuttons');?>
			<?php $this->load->view('templates/commentModal');?>
	</div>
		
</div><!--End of the Whole Row (LeftNav, Contents, Third Column -->


<script type="text/javascript">
$(document).ready(function(){
	$('.postcont').html("")
	var postid = '<?php echo $postid;?>'
	$.ajax({
		type: 'POST',
        url: '<?php echo base_url() ?>notification/post',
        data:{
        	postid:postid
        },
        success: function(s){
        	var posts = JSON.parse(s)
        	console.log(posts);
        	$.each(posts, function(index) {
        		if(posts[index].PostType==1){
        		$('.postcont').html(
        						$('.postcont').html()+'<div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user" href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'">'+posts[index].PostUser+'</a><small> shared a thought!<br /><small>'+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbody"><div class="postbodycont">'+posts[index].thoughtBody+'</div></div><div id="likesection"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" onclick="handleBtnClick(event)"><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment </a></div></div></div>'
        						);}

				if(posts[index].PostType==2){
								$('.postcont').html($('.postcont').html()+'<div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> released an audio!</small><br /><small><small> '+posts[index].PostDate+'</small></small><small></small></h4></div></div></div><div class="postbodyaudio"><div class="media"><div class="media-left"><a href="#" ><div class="media-object albumCover" style="background-image:url('+posts[index].audioCover+');"></div></a></div><div class="media-body "><h4 style="color: black" class="media-heading"><i class="fa fa-music"></i><b style="color: #ff9926"> Title:</b> '+posts[index].audioTitle+'</h4><h6 style="padding: 5px 2.2em"><b> Artist:</b> '+posts[index].PostUser+'</h6><h6 style="padding: 0 2.2em"><b> Genre:</b>'+posts[index].audioGenre+'</h6><h6 style="padding: 0 2.2em"><b> Year:</b> 2017</h6><p id="audDesc" style="padding: 0 2.2em">'+posts[index].audioAbout+'</p><hr /></div></div><div class="row" ><div class="col-md-12"><audio id="audio" controls controlsList="nodownload" width="100%"><source src="'+posts[index].audioPath+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" onclick="handleBtnClick(event)"><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment </a><a href="#" class="btn"><span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a><a class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> 123,234 plays</small></a></div></div></div></div>'
        						);
				};
				if(posts[index].PostType==3){
								$('.postcont').html($('.postcont').html()+'<div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> shared a video!</small><br /><small><small> '+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbodyaudio"><h5 class="media-heading text-center"><i class="fa fa-video-camera"></i> '+posts[index].videoTitle+'</h5><div class="row" ><div class="col-md-12"><video src="'+posts[index].videoPath+'" style="width:100%; height: 250px" controls controlsList="nodownload"></video></div></div><h6 style="color: #1e1e1e">'+posts[index].videoAbout+'</h6><br /><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" onclick="handleBtnClick(event)"><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment </a><a class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> 123,234 plays</small></a></div></div></div></div>'

        						);

				};
				
								$('[data-id]').click(function(e) {
									e.preventDefault();
									var buttonid = $(this).attr('data-id');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/likes',
										data:{
											postid:buttonid
										},
										success: function(s){
											var likes = JSON.parse(s);
											$("[data-id='"+buttonid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
										},
										error: function(e){
											console.log(e);
											alert('error');
										}
									});

								});

								$('[data-did]').click(function(e) {
									e.preventDefault();
									$('.commentatorDiv').html('')
									var buttonid = $(this).attr('data-did');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/getcomments',
										data:{
											postid:buttonid
										},
										success: function(s){
											var comments = JSON.parse(s)
        									console.log(comments);
        									showCommentModal(comments,buttonid);
										},
										error: function(){
											console.log(e)
										}

									});
									
								});
								
        	});
        },
        error: function(xhr, ajaxOptions, thrownError){
        	console.log(e);
        }
    });
	
	function showCommentModal(comments,postid){
		$('.h4').html('<span></span> Comments<small> on ... post</small>')
		 $('#commentModal').modal('show')
		 $.each(comments, function(index) {
	        $('.commentatorDiv').html(
			$('.commentatorDiv').html()+'<div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+comments[index].username+'"><div class="media-object commentPic" style="background-image:url('+comments[index].picture+');"></div></a></div><div class="media-body"><h5 class="media-heading"><a style="font-weight:bold" class="user">'+comments[index].username+'</a><small><small> '+comments[index].posted_at+'</small></small></h5><h6>'+comments[index].comment+'</h6></div></div>'
			)
        });
		 $('.postComment').attr('data-cid' , postid);

		 $('.postComment').click(function(e) {
		 	e.preventDefault();
		 	var id = $(this).attr("data-cid");

			var txt = $("#commentBox").val();
			$("#commentBox").val('');
			$.ajax({
				type:'POST',
				url: '<?php echo base_url() ?>mimo/comment',
				data:{
					comment:txt,
					postid:id
				},
				success: function(r){
					if(r!=''){
						var comment = JSON.parse(r)
						console.log(comment)
						$( ".commentatorDiv" ).prepend( '<div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+comment[0].username+'"><div class="media-object commentPic" style="background-image:url('+comment[0].picture+');"></div></a></div><div class="media-body"><h5 class="media-heading"><a style="font-weight:bold" class="user">'+comment[0].username+'</a><small><small> '+comment[0].posted_at+'</small></small></h5><h6>'+comment[0].comment+'</h6></div></div>' );
					}
				},
				error: function(e){
					console.log(e);
				}

			});
		 });
	}
});
</script>
</body>