<body style="background-color: #e6e6e6">

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

			<div class="row" style="margin: 10px">
				<div id="listNav" class="col-md-12">
					<div class="btn-group btn-group-justified">
					<a class="btn sideBtn" href="http://localhost/mimo/mimo/settings"><span class="fa fa-gear"></span> Edit Profile</a>
					</div>
				</div>
			</div>
			
			
			<!--MP3 Player Section-->
		
			
			<!-- MP3 Player Section-->
			
			
			
			
			
		</div>
		<!--End of Left Nav Section -->
			
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
	
	<!-- Para sa POST AND AUDIO MODAL-->
	<?php $this->load->view('templates/addpostmodal');?>
	<?php $this->load->view('templates/addaudiomodal');?>
	<?php $this->load->view('templates/addvideomodal');?>
	
		<!--Para naman to dun sa fixed button ng release ng thoughts at audio-->
		<?php $this->load->view('include/releasebuttons');?>
			<?php $this->load->view('templates/commentModal');?>
			<?php $this->load->view('templates/colmodal');?>
	</div>
		
</div><!--End of the Whole Row (LeftNav, Contents, Third Column -->



<script type="text/javascript">
var start = 0;
var working = false;
var user = '<?php echo $users[0]['id'];?>'
$(document).ready(function(){
	$('.postcont').html("")
	$.ajax({
		type: 'POST',
        url: '<?php echo base_url() ?>mimo/hallposts',
        data:{
        	start:start
        },
        success: function(s){
        	var posts = JSON.parse(s)
        	console.log(posts);
        	if(posts.PostId==="error"){
        		//Edit mo to
        			$('.postcont').html('<h5 class="text-center" style="margin-top: 40px">Your music hall is empty. Go to <a href="http://localhost/mimo/browse">Browse </a>to discover and follow artists to stay updated from here!</h5>')

        		}
        	else{
        	$.each(posts, function(index) {
        		if(posts[index].PostType==1){

        		$('.postcont').html(
        						$('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user" href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'">'+posts[index].PostUser+'</a><small> shared a thought!<a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small>'+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbody"><div class="postbodycont">'+posts[index].thoughtBody+'</div></div><div id="likesection"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a></div></div></div>'
        						);}

				if(posts[index].PostType==2){

								$('.postcont').html($('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> released an audio!</small><a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small><small> '+posts[index].PostDate+'</small></small><small></small></h4></div></div></div><div class="postbodyaudio"><div class="media"><div class="media-left"><a href="#" ><div class="media-object albumCover" style="background-image:url('+posts[index].audioCover+');"></div></a></div><div class="media-body "><h4 style="color: black" class="media-heading"><i class="fa fa-music"></i><b style="color: #ff9926"> Title:</b> '+posts[index].audioTitle+'</h4><h6 style="padding: 5px 2.2em"><b> Artist:</b> '+posts[index].PostUser+'</h6><h6 style="padding: 0 2.2em"><b> Genre:</b>'+posts[index].audioGenre+'</h6><h6 style="padding: 0 2.2em"><b> Year:</b> 2017</h6><p id="audDesc" style="padding: 0 2.2em">'+posts[index].audioAbout+'</p><hr /></div></div><div class="row" ><div class="col-md-12"><audio id="audio" data-audioend="'+posts[index].PostId+'" controls controlsList="nodownload" width="100%"><source src="'+posts[index].audioPath+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a><a data-audioscollectionid="'+posts[index].PostId+'" id="addCollect" class="btn comment" data-toggle="modal" ><span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a><a class="btn view disabled" data-audioendplay="'+posts[index].PostId+'" ><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+posts[index].audioviews+' plays</small></a></div></div></div></div>'

        						);
				};
				
				if(posts[index].PostType==3){
								$('.postcont').html($('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> shared a video!</small><a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small><small> '+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbodyaudio"><h5 class="media-heading text-center"><i class="fa fa-video-camera"></i> '+posts[index].videoTitle+'</h5><div class="row" ><div class="col-md-12"><video data-videoend="'+posts[index].PostId+'" src="'+posts[index].videoPath+'" style="width:100%; height: 250px" controls controlsList="nodownload"></video></div></div><h6 style="color: #1e1e1e">'+posts[index].videoAbout+'</h6><br /><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a><a data-videoendplay="'+posts[index].PostId+'" class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+posts[index].videoviews+' plays</small></a></div></div></div></div>'
        						);

				};
				$('.report-alert').hide()
								
								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:posts[index].PostId,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-id='"+posts[index].PostId+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+posts[index].PostLikes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})

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
											if(likes.stats=='unlike'){
												$("[data-id='"+buttonid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-id='"+buttonid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
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
								$('[data-audioscollectionid]').click(function(e) {
									e.preventDefault()
									$('#sel1').html('<option></option>');
									$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>mimo/getcollectionlist',
											data:{
												userid:user
											},
											success: function(s){
												var lists = JSON.parse(s)
												console.log(lists)
												 $.each(lists, function(index) {
												 	$('#sel1').html($('#sel1').html()+'<option value="'+lists[index].id+'">'+lists[index].name+'</option>')
												 });
											},
											error: function(e){
												console.log(e);
												alert('error');
											}
										});
									var postid = $(this).attr('data-audioscollectionid');
									$('#collectModal').modal('show')
									$('#collecModal').attr('data-colid' , postid);
									$('[data-colid]').click(function(e) {
										e.preventDefault()
										var colid = $(this).attr('data-colid');
										var option = $('#sel1').val();
										var newcol = $('#text').val();
										$("#sel1").val('');
										$("#text").val('');
										$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>mimo/addnewcol',
											data:{
												colid:colid,
												option:option,
												newcol:newcol,
												userid:user
											},
											success: function(s){
												var status = JSON.parse(s)
												console.log(status);
												if(status.status=="Added Successfully"){
													$("#col-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $('#col-alert').hide(); 
							                            $('#collectModal').modal('hide');
							                        }, 2000);
												}
												else if(status.status=="This audio already exists in this collection list!"){
													$("#colec-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $("#colec-alert").hide(); 
							                        }, 2000);
												}
												else if(status.status=="Audio successfully added to the new collection!"){
															$("#col-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $('#col-alert').hide(); 
							                            $('#collectModal').modal('hide');
							                        }, 2000);
												}
											},
											error: function(e){
												console.log(e);
												alert('error');
											}
										});

									});
								});
								$('[data-audioend]').on('ended',function(){
									var audioid = $(this).attr('data-audioend');
							      	$.ajax({
							      		type: 'POST',
							      		url: '<?php echo base_url() ?>mimo/audioview',
							      		data:{
							      			audioid:audioid
							      		},
							      		success: function(s){
							      			var views = JSON.parse(s)
							      			console.log(views)
							      			$("[data-audioendplay='"+audioid+"']").html('<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+views.views+' plays</small>');
							      		},
							      		error: function(e){
							      			console.log(e)
							      		}

							      	})
							    });
							    $('[data-videoend]').on('ended',function(){
									var videoid = $(this).attr('data-videoend');
							      	$.ajax({
							      		type: 'POST',
							      		url: '<?php echo base_url() ?>mimo/videoview',
							      		data:{
							      			videoid:videoid
							      		},
							      		success: function(s){
							      			var views = JSON.parse(s)
							      			console.log(views)
							      			$("[data-videoendplay='"+videoid+"']").html('<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+views.views+' plays</small>');
							      		},
							      		error: function(e){
							      			console.log(e)
							      		}

							      	})
							    });
							    $('[data-reportpost]').click(function(e) {
									e.preventDefault();
									var reportid = $(this).attr('data-reportpost');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/reportpost',
										data:{
											reportid:reportid,
											userid:user
										},
										success: function(s){
											var res = JSON.parse(s)
											console.log(res)
											$('[data-alert='+reportid+']').html('<button type="button" class="close" data-dismiss="alert">x</button><strong>Post reported!</strong> '+res.status+' ')
											$('[data-alert='+reportid+']').fadeIn(500, 0);
												window.setTimeout(function() {
							                        $('[data-alert='+reportid+']').hide(500, 0); 
							                    }, 2000);
										},
										error: function(e){
											console.log(e);
										}
									});

								});
        	});
			start += 5;
		}
        },
        error: function(xhr, ajaxOptions, thrownError){
        	console.log(e);
        }
    });
	
});
$(window).scroll(function() {
	if ($(this).scrollTop() + 1 >= $('body').height() - $(window).height()-10) {
		if (working == false) {
			working = true;
			$.ajax({
				type: 'POST',
		        url: '<?php echo base_url() ?>mimo/hallposts',
		        data:{
		        	start:start
		        },
		        success: function(s){
		        	var posts = JSON.parse(s)
		        	console.log(posts);
		        	$.each(posts, function(index) {
        		if(posts[index].PostType==1){

        		$('.postcont').html(
        						$('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user" href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'">'+posts[index].PostUser+'</a><small> shared a thought!<a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small>'+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbody"><div class="postbodycont">'+posts[index].thoughtBody+'</div></div><div id="likesection"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a></div></div></div>'
        						);}

				if(posts[index].PostType==2){

								$('.postcont').html($('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> released an audio!</small><a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small><small> '+posts[index].PostDate+'</small></small><small></small></h4></div></div></div><div class="postbodyaudio"><div class="media"><div class="media-left"><a href="#" ><div class="media-object albumCover" style="background-image:url('+posts[index].audioCover+');"></div></a></div><div class="media-body "><h4 style="color: black" class="media-heading"><i class="fa fa-music"></i><b style="color: #ff9926"> Title:</b> '+posts[index].audioTitle+'</h4><h6 style="padding: 5px 2.2em"><b> Artist:</b> '+posts[index].PostUser+'</h6><h6 style="padding: 0 2.2em"><b> Genre:</b>'+posts[index].audioGenre+'</h6><h6 style="padding: 0 2.2em"><b> Year:</b> 2017</h6><p id="audDesc" style="padding: 0 2.2em">'+posts[index].audioAbout+'</p><hr /></div></div><div class="row" ><div class="col-md-12"><audio id="audio" data-audioend="'+posts[index].PostId+'" controls controlsList="nodownload" width="100%"><source src="'+posts[index].audioPath+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a><a data-audioscollectionid="'+posts[index].PostId+'" id="addCollect" class="btn comment" data-toggle="modal" ><span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a><a class="btn view disabled" data-audioendplay="'+posts[index].PostId+'" ><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+posts[index].audioviews+' plays</small></a></div></div></div></div>'

        						);
				};
				
				if(posts[index].PostType==3){
								$('.postcont').html($('.postcont').html()+'<div data-alert="'+posts[index].PostId+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" ><div class="media-object postPic" style="background-image:url('+posts[index].PostUserPicture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+posts[index].PostUser+'" class="user">'+posts[index].PostUser+'</a><small> shared a video!</small><a data-reportpost="'+posts[index].PostId+'" class="btn del pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><br /><small><small> '+posts[index].PostDate+'</small></small></h4></div></div></div><div class="postbodyaudio"><h5 class="media-heading text-center"><i class="fa fa-video-camera"></i> '+posts[index].videoTitle+'</h5><div class="row" ><div class="col-md-12"><video data-videoend="'+posts[index].PostId+'" src="'+posts[index].videoPath+'" style="width:100%; height: 250px" controls controlsList="nodownload"></video></div></div><h6 style="color: #1e1e1e">'+posts[index].videoAbout+'</h6><br /><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].PostId+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].PostLikes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].PostId+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].PostComments+')</small></small></a><a data-videoendplay="'+posts[index].PostId+'" class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+posts[index].videoviews+' plays</small></a></div></div></div></div>'
        						);

				};
				$('.report-alert').hide()
								
								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:posts[index].PostId,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-id='"+posts[index].PostId+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+posts[index].PostLikes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})

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
											if(likes.stats=='unlike'){
												$("[data-id='"+buttonid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-id='"+buttonid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
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
								$('[data-audioscollectionid]').click(function(e) {
									e.preventDefault()
									$('#sel1').html('<option></option>');
									$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>mimo/getcollectionlist',
											data:{
												userid:user
											},
											success: function(s){
												var lists = JSON.parse(s)
												console.log(lists)
												 $.each(lists, function(index) {
												 	$('#sel1').html($('#sel1').html()+'<option value="'+lists[index].id+'">'+lists[index].name+'</option>')
												 });
											},
											error: function(e){
												console.log(e);
												alert('error');
											}
										});
									var postid = $(this).attr('data-audioscollectionid');
									$('#collectModal').modal('show')
									$('#collecModal').attr('data-colid' , postid);
									$('[data-colid]').click(function(e) {
										e.preventDefault()
										var colid = $(this).attr('data-colid');
										var option = $('#sel1').val();
										var newcol = $('#text').val();
										$("#sel1").val('');
										$("#text").val('');
										$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>mimo/addnewcol',
											data:{
												colid:colid,
												option:option,
												newcol:newcol,
												userid:user
											},
											success: function(s){
												var status = JSON.parse(s)
												console.log(status);
												if(status.status=="Added Successfully"){
													$("#col-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $('#col-alert').hide(); 
							                            $('#collectModal').modal('hide');
							                        }, 2000);
												}
												else if(status.status=="Already exists Collection list"){
													$("#colec-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $("#colec-alert").hide(); 
							                        }, 2000);
												}
												else if(status.status=="Audio Added to New Collection"){
															$("#col-alert").fadeIn(500, 0);
													window.setTimeout(function() {
							                            $('#col-alert').hide(); 
							                            $('#collectModal').modal('hide');
							                        }, 2000);
												}
											},
											error: function(e){
												console.log(e);
												alert('error');
											}
										});

									});
								});
								$('[data-audioend]').on('ended',function(){
									var audioid = $(this).attr('data-audioend');
							      	$.ajax({
							      		type: 'POST',
							      		url: '<?php echo base_url() ?>mimo/audioview',
							      		data:{
							      			audioid:audioid
							      		},
							      		success: function(s){
							      			var views = JSON.parse(s)
							      			console.log(views)
							      			$("[data-audioendplay='"+audioid+"']").html('<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+views.views+' plays</small>');
							      		},
							      		error: function(e){
							      			console.log(e)
							      		}

							      	})
							    });
							    $('[data-videoend]').on('ended',function(){
									var videoid = $(this).attr('data-videoend');
							      	$.ajax({
							      		type: 'POST',
							      		url: '<?php echo base_url() ?>mimo/videoview',
							      		data:{
							      			videoid:videoid
							      		},
							      		success: function(s){
							      			var views = JSON.parse(s)
							      			console.log(views)
							      			$("[data-videoendplay='"+videoid+"']").html('<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+views.views+' plays</small>');
							      		},
							      		error: function(e){
							      			console.log(e)
							      		}

							      	})
							    });
							    $('[data-reportpost]').click(function(e) {
									e.preventDefault();
									var reportid = $(this).attr('data-reportpost');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/reportpost',
										data:{
											reportid:reportid,
											userid:user
										},
										success: function(s){
											var res = JSON.parse(s)
											console.log(res)
											$('[data-alert='+reportid+']').html('<button type="button" class="close" data-dismiss="alert">x</button><strong>Post reported!</strong> '+res.status+' ')
											$('[data-alert='+reportid+']').fadeIn(500, 0);
												window.setTimeout(function() {
							                        $('[data-alert='+reportid+']').hide(500, 0); 
							                    }, 2000);
										},
										error: function(e){
											console.log(e);
										}
									});

								});
        	});
					start += 5;
                    setTimeout(function() {
                         working = false;
                    }, 1000)
		        },
		        error: function(xhr, ajaxOptions, thrownError){
		        	console.log(e);
		        }
		    });
			

		}
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

								$("[data-did='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
							}
						},
						error: function(e){
							console.log(e);
						}

					});
				 });
			}

</script>
</body>