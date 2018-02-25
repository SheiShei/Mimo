<body style="background-color: #d6d6d6">
<div class="container" style="margin-top: 20px; ">
	
	<br />
	<br />
	
	<div class="row">
				<!-- Header -->
					<!-- Sa 'background-image: url('') mo ilagay yung mga header at profile pic -->
				<div class="headerStudio" style="background-image:url('<?php echo $user[0]['header']; ?>'); width: 100%; height: auto; margin-left: 0px; background-size: cover;">
					<!--DP-->
					<div class="nameBox" style="background: linear-gradient(transparent,rgba(0,0,0,0.2),rgba(0,0,0,0.8)); 
												background-size: cover; margin: 0 0; height: auto">
						<div class="dpSectionStudio media" style="background-image:url('<?php if ($user[0]['picture'] == NULL){ echo 'http://localhost/mimo/assets/img/noimage.jpg'; } else { echo $user[0]['picture'];} ?>');"></div>
							
						
						<!-- Full name yung sa h4 at username/stagename yung sa h6 -->
						<h3 style="color: white" class="text-center user"><?php echo $user[0]['fullname'];?>
						</h3>
						<a href="http://localhost/mimo/myStudio?username=<?php echo $user[0]['username'];?> " style="color: white" class="text-center user"><h5><?php echo $user[0]['username'];?></h5></a>
						
						
						<div class="row">
							<div class="col-md-4">
								<h6 style="padding: 0 2.2em" class="profile text-center"><b style="color: #ffa31a"><i class="fa fa-music"></i> Genres:</b> <br />
								<?php if ( $about[0]['genre1'] == NULL && $about[0]['genre2'] == NULL && $about[0]['genre1'] == NULL)
								{
									echo (" None ");
								}
								else
								{
									if($about[0]['genre1'] == NULL)
									{
										echo $about[0]['genre2'].' . ' .$about[0]['genre3'];
									}
									else if($about[0]['genre2'] == NULL)
									{
										echo $about[0]['genre1'].' . ' .$about[0]['genre3'];
									}
									else if($about[0]['genre3'] == NULL)
									{
										echo $about[0]['genre1'].' . ' .$about[0]['genre2'];
									}
									else{
										echo $about[0]['genre1'].' . ' .$about[0]['genre2'].' . ' .$about[0]['genre3']; 
									}
								}?> </h6>
							</div>
							
							<div class="col-md-4">
								<h6 style="padding: 0 2.2em" class="profile text-center"><b style="color: #ffa31a"><i class="fa fa-briefcase"></i>
								 Career:</b> <br />
								<?php if ( $about[0]['career'] == NULL)
								{
									echo ("None");
								}
								else{
								echo $about[0]['career'] ; }?></h6>
							</div>
							
							<div class="col-md-4">
								<h6 style="padding: 0 2.2em" class="followers profile text-center"><b style="color: #ffa31a"><i class="fa fa-users"></i> Followers:</b> <br />
								<?php echo $about[0]['followers'];?> People</h6>
							</div>
						</div>

					</div>

		</div>
			
	</div>
	
	
	<div class="row" style="background-color: #404040;">
		<!--Profile Info: SHOUTOUT(Parang Bio) -->
		<div class="col-md-12" style="">
				<!--Put here the bio 
				
				<p class="text-center"><b>You've got to hold your head up high! You've got to hold your head up high!
				You've got to hold your head up high! You've got to hold your head up high! You've got to hold your head up high!</b> -->
				<?php if($user[0]['id']!=$users[0]['id']){ ?>
							
								<a id="follow" class="btn follow pull-right" style="margin: 10px"><i class="fa fa-bell-o"></i><span> Follow</span></a>
						
							<?php };?>
				
		</div>
	</div>
	<div class="row">
					<ul class="nav nav-tabs nav-justified">
						<!-- COLLECTIONS, ALBUMS, THOUGHTS, and FAVORITES TABS-->
						<li class="active"><a data-toggle="tab" href="#audios"><i class="fa fa-music"></i>&nbsp;Audios</a></li>
						<li><a data-toggle="tab" href="#thought" ><span><i class="fa fa-comments"></i></span>&nbsp;Thoughts</a></li>
						<li><a data-toggle="tab" href="#collections" ><span><i class="fa fa-list-ul"></i></span>&nbsp;Collections</a></li>
						<li><a data-toggle="tab" href="#vids" ><span><i class="fa fa-video-camera"></i></span>&nbsp;Videos</a></li>
					</ul>

						<div class="tab-content">
						<?php $this->load->view('templates/commentModal');?>
						<!-- COLLECTIONS -->
							<div id="audios" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-3"></div>
								<!-- PUT HERE THE COLLECTIONS-->
								<div class="col-md-6 audios">	
								<!-- -->
								</div>
								
								<div class="col-md-3"></div>
							</div>
							</div>
   
						<!-- ALBUMS-->
							<div id="collections" class="tab-pane fade" >
							<div class="row">

								<div class="col-md-2"></div>
									
								<div class="col-md-8">	
									<div class="alert alert-success" id="deletes-alert">
							            <strong>Success! </strong>
							            Deleted Successfully!
							        </div>
									
								<!-- foreach collection -->
								<?php 
								if($collectionList!=null){
									foreach($collectionList as $data['cl']){

										$postid = $data['cl']['id'];
										$collectionSongList = $this->getposts->getcollectionsonglists($postid);
										$data['collectionsongList'] =$collectionSongList;
										$data['user']=$user;
										$data['users']=$users;
										$this->load->view('templates/collectionbox',$data);
									}
								}
								else{
									//Edit mo to
									echo '<h5 class="text-center">No collections yet.</h5>';
								}
								?>
									<!-- -->
								</div>
								<div class="col-md-2"></div>
								
							</div>
							</div>
							
							
							<!-- THOUGHTS-->
							<div id="thought" class="tab-pane fade">
								<div class="row">
									<div class="col-md-3">
									</div>
									<div class="col-md-6 thoughts">
										<!-- PUT HERE THE THOUGHTS-->

										<!-- -->
									</div>
									<div class="col-md-3">
									</div>
								</div>
							</div>	
							
							<!-- FAVORITES-->
							<div id="vids" class="tab-pane fade">
							<div class="row">
								<div class="col-md-3"></div>
									
								<div class="col-md-6 videos">	
									<!-- PUT HERE THE FAVORITES-->
					
									<!-- -->
								</div>
								
								<div class="col-md-3"></div>
							</div>		
						</div>
</div>
	<?php $this->load->view('include/releasebuttons');?>
	<?php $this->load->view('templates/addpostmodal');?>
	<?php $this->load->view('templates/addaudiomodal');?>
	<?php $this->load->view('templates/addvideomodal');?>
	<?php $this->load->view('templates/colmodal');?>
	<?php $this->load->view('templates/delete_modal');?>
	<?php $this->load->view('templates/deletecol_modal');?>
	</div>
</div>
</body>

<script>
	$(function(){
     initiateFollow();
});
</script>

<!-- Get Posts thoughts -->
<script type="text/javascript">
$(document).ready(function()
{
	//get thoughts posts
	var buserid = '<?php echo $user[0]['id'];?>';
	var userid = '<?php echo $users[0]['id'];?>';
	var user = '<?php echo $users[0]['id'];?>'
	if(buserid!=userid){
		var check = 'not'
	}
	else{
		var check = 'yes'
	}
	$.ajax({
		type: 'POST',
        url: '<?php echo base_url() ?>mimo/posts',
        data:{
          	browseuser:buserid
        },
        success: function(s){
			var posts = JSON.parse(s);
        	console.log(posts);
        	if(posts.id==="error"){
        		//Edit mo to
        			$('.thoughts').html('<h5 class="text-center">No shared thoughts yet.</h5>')

        		}
        	else{
        	$.each(posts, function(index) {
        		$('.thoughts').html(
        						$('.thoughts').html()+'<div data-alert="'+posts[index].id+'" class="alert alert-danger report-alert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="#" ><div class="media-object postPic" style="background-image:url('+posts[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user" href="http://localhost/mimo/myStudio?username='+posts[index].username+'">'+posts[index].username+'</a><small> shared a thought!<a data-reportpost="'+posts[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><a class="btn del pull-right" data-toggle="modal" data-delid="'+posts[index].id+'"><span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span></a><br /><small>'+posts[index].posted_at+'</small></small></h4></div></div></div><div class="postbody"><div class="postbodycont">'+posts[index].body+'</div></div><div id="likesection"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-id="'+posts[index].id+'" aria-pressed="false"><span class="fa fa-heart-o"></span> Like <small><small>('+posts[index].likes+')</small></small></a><a class="commentBtn btn comment" data-did="'+posts[index].id+'" ><span class="fa fa-commenting-o"></span> Comment <small><small>('+posts[index].comments+')</small></small></a></div></div></div>'
        						);
						$('.report-alert').hide()
								if(check=='not'){
									$('a.del').empty();
								}

								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:posts[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-id='"+posts[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+posts[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})
								
								//if like button click
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
								//if comment button click
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
        									//call showCommentModal function to display all comments
        									showCommentModal(comments,buttonid,1);

										},
										error: function(){
											console.log(e)
										}

									});

								});
								$('[data-delid]').click(function(e) {
						            e.preventDefault();
						            var delid = $(this).attr('data-delid');
						            showDeleteModal(delid)

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
			}
        },
        error: function(xhr, ajaxOptions, thrownError){
        	console.log(arguments);
        	alert('error');
        }

	});
	//get audio posts
	var buserid = '<?php echo $user[0]['id'];?>';
	var userid = '<?php echo $users[0]['id'];?>';
	$('.audios').html('')
	$.ajax({
		type: 'POST',
        url: '<?php echo base_url() ?>mimo/audioposts',
        data:{
          	browseuser:buserid
        },
        success:function(s){
        	var audioposts = JSON.parse(s)
        	console.log(audioposts)
        	if(audioposts.id==="error"){
        		//Edit mo to
        			$('.audios').html('<h5 class="text-center">No released audios yet.</h5>')
        		}
        	else{
        	$.each(audioposts, function(index) {

        		$('.audios').html($('.audios').html()+'<div data-aalert="'+audioposts[index].id+'" class="alert alert-danger report-aalert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="#" ><div class="media-object postPic" style="background-image:url('+audioposts[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user">'+audioposts[index].username+'</a><small> released an audio!</small><a data-areportpost="'+audioposts[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><a class="btn del pull-right" data-toggle="modal" data-delid="'+audioposts[index].id+'"><span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span></a><br /><small><small> '+audioposts[index].posted_at+'</small></small><small></small></h4></div></div></div><div class="postbodyaudio"><div class="media"><div class="media-left"><a href="#" ><div class="media-object albumCover" style="background-image:url('+audioposts[index].cover+');"></div></a></div><div class="media-body "><h4 style="color: black" class="media-heading"><i class="fa fa-music"></i><b style="color: #ff9926"> Title:</b> '+audioposts[index].title+'</h4><h6 style="padding: 5px 2.2em"><b> Artist:</b> '+audioposts[index].username+'</h6><h6 style="padding: 0 2.2em"><b> Genre:</b>'+audioposts[index].genre+'</h6><h6 style="padding: 0 2.2em"><b> Year:</b> 2017</h6><p id="audDesc" style="padding: 0 2.2em">'+audioposts[index].about+'</p><hr /></div></div><div class="row" ><div class="col-md-12"><audio data-audioend="'+audioposts[index].id+'" id="audio" controls controlsList="nodownload" width="100%"><source src="'+audioposts[index].path+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-postid="'+audioposts[index].id+'" aria-pressed="false" ><span class="fa fa-heart-o"></span> Like <small><small>('+audioposts[index].likes+')</small></small></a><a class="commentBtn btn comment" data-postdid="'+audioposts[index].id+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+audioposts[index].comments+')</small></small></a><a data-audioscollectionid="'+audioposts[index].id+'" id="addCollect" class="btn comment" data-toggle="modal" ><span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a><a class="btn view disabled" data-audioendplay="'+audioposts[index].id+'"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+audioposts[index].views+' plays</small></a></div></div></div></div>'

        			);
					$('.report-aalert').hide()
								if(check=='not'){
									$('a.del').empty();
								}
								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:audioposts[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-postid='"+audioposts[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+audioposts[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})
								$('[data-postid]').click(function(e) {
									e.preventDefault();
									var buttonid = $(this).attr('data-postid');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/likes',
										data:{
											postid:buttonid
										},
										success: function(s){
											var likes = JSON.parse(s);
											if(likes.stats=='unlike'){
												$("[data-postid='"+buttonid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-postid='"+buttonid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
										},
										error: function(e){
											console.log(e);
											alert('error');
										}
									});

								});
								$('[data-postdid]').click(function(e) {
									e.preventDefault();
									$('.commentatorDiv').html('')
									var buttonid = $(this).attr('data-postdid');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/getcomments',
										data:{
											postid:buttonid
										},
										success: function(s){
											var comments = JSON.parse(s)
        									console.log(comments);
        									showCommentModal(comments,buttonid,2);

										},
										error: function(){
											console.log(e)
										}

									});

								});
								$('[data-delid]').click(function(e) {
						            e.preventDefault();
						            var delid = $(this).attr('data-delid');
						            showDeleteModal(delid)

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
							     $('[data-areportpost]').click(function(e) {
									e.preventDefault();
									var reportid = $(this).attr('data-areportpost');
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
											$('[data-aalert='+reportid+']').html('<button type="button" class="close" data-dismiss="alert">x</button><strong>Post reported!</strong> '+res.status+' ')
											$('[data-aalert='+reportid+']').fadeIn(500, 0);
												window.setTimeout(function() {
							                        $('[data-aalert='+reportid+']').hide(500, 0); 
							                    }, 2000);
										},
										error: function(e){
											console.log(e);
										}
									});

								});

								

        		});
			}
        },
        error:function(e){
        	console.log(e)
        }
    });
	//get video posts
	var buserid = '<?php echo $user[0]['id'];?>';
	var userid = '<?php echo $users[0]['id'];?>';

	$('.videos').html('')
	$.ajax({
		type: 'POST',
        url: '<?php echo base_url() ?>mimo/videoposts',
        data:{
          	browseuser:buserid
        },
        success:function(s){
        	var videoposts = JSON.parse(s)
        	console.log(videoposts)
        	if(videoposts.id==="error"){
        		//Edit mo to
        			$('.videos').html('<h5 class="text-center">No shared videos yet.</h5>')
        		}
        	else{
        	$.each(videoposts, function(index) {
        		$('.videos').html($('.videos').html()+'<div data-vlert="'+videoposts[index].id+'" class="alert alert-danger report-valert" ></div><div class="posttemp"><div class="posthead"><div class="media"><div class="media-left"><a href="#" ><div class="media-object postPic" style="background-image:url('+videoposts[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a class="user">'+videoposts[index].username+'</a><small> shared a video!</small><a data-vreportpost="'+videoposts[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><a class="btn del pull-right" data-toggle="modal" data-delid="'+videoposts[index].id+'"><span class="fa fa-trash del" data-toggle="tooltip" data-placement="top" title="Delete"></span></a><br /><small><small> '+videoposts[index].posted_at+'</small></small></h4></div></div></div><div class="postbodyaudio"><h5 class="media-heading text-center"><i class="fa fa-video-camera"></i> '+videoposts[index].name+'</h5><div class="row" ><div class="col-md-12"><video data-videoend="'+videoposts[index].id+'" src="'+videoposts[index].url+'" style="width:100%; height: 250px" controls controlsList="nodownload"></video></div></div><h6 style="color: #1e1e1e">'+videoposts[index].description+'</h6><br /><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a href="#" id="likeBtn" type="button" class="btn like" data-likeid="'+videoposts[index].id+'" aria-pressed="false"><span class="fa fa-heart-o"></span> Like <small><small>('+videoposts[index].likes+')</small></small></a><a class="commentBtn btn comment" data-comid="'+videoposts[index].id+'" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+videoposts[index].comments+')</small></small></a><a data-videoendplay="'+videoposts[index].id+'" class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small class="pull-right"> '+videoposts[index].plays+' plays</small></a></div></div></div></div>'

        			);
						$('.report-valert').hide()
							
								if(check=='not'){
									$('a.del').empty();
								}

								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:videoposts[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-likeid='"+videoposts[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+videoposts[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})

								$('[data-likeid]').click(function(e) {
									e.preventDefault();
									var buttonid = $(this).attr('data-likeid');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/likes',
										data:{
											postid:buttonid
										},
										success: function(s){
											var likes = JSON.parse(s);
											if(likes.stats=='unlike'){
												$("[data-likeid='"+buttonid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-likeid='"+buttonid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
										},
										error: function(e){
											console.log(e);
											alert('error');
										}
									});

								});
								//if comment button click
								$('[data-comid]').click(function(e) {
									e.preventDefault();
									$('.commentatorDiv').html('')
									var buttonid = $(this).attr('data-comid');
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>mimo/getcomments',
										data:{
											postid:buttonid
										},
										success: function(s){
											var comments = JSON.parse(s)
        									console.log(comments);
        									//call showCommentModal function to display all comments
        									showCommentModal(comments,buttonid,3);

										},
										error: function(){
											console.log(e)
										}

									});

								});
								$('[data-delid]').click(function(e) {
						            e.preventDefault();
						            var delid = $(this).attr('data-delid');
						            showDeleteModal(delid)

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
							    $('[data-vreportpost]').click(function(e) {
									e.preventDefault();
									var reportid = $(this).attr('data-vreportpost');
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
											alert(res.status)
											$('[data-vlert='+reportid+']').html('<button type="button" class="close" data-dismiss="alert">x</button><strong>Post reported!</strong> '+res.status+' ')
											$('[data-vlert='+reportid+']').fadeIn(500, 0);
												window.setTimeout(function() {
							                        $('[data-vlert='+reportid+']').hide(500, 0); 
							                    }, 2000);
										},
										error: function(e){
											console.log(e);
										}
									});

								});
        		});
						
			}
        },
        error:function(e){
        	console.log(e)
        }
    });

					// if(buserid!=userid){
					// 		$('a.del').empty();
					// 		alert('ada')
					// 	}
	function showDeleteModal(id){
		$('#myModal').modal('show')
		$('#delyes').attr('data-dmid' , id);
		$('#delyes').click(function() {
			var did = $(this).attr("data-dmid");
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() ?>mimo/delete',
				data:{
					postid:did
				},
				success: function(s){
					console.log(s)
					location.reload(true);
				},
				error: function(e){
					console.log(e)
				}
			});
		});
		
	}
	function showCommentModal(comments,postid,type){
		$('.h4').html('<span></span> Comments<small> on ... post</small>')
		 $('#commentModal').modal('show')
		 $.each(comments, function(index) {
	        $('.commentatorDiv').html(
			$('.commentatorDiv').html()+'<div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+comments[index].username+'"><div class="media-object commentPic" style="background-image:url('+comments[index].picture+');"></div></a></div><div class="media-body"><h5 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+comments[index].username+'" style="font-weight:bold" class="user">'+comments[index].username+'</a><small><small> '+comments[index].posted_at+'</small></small></h5><h6>'+comments[index].comment+'</h6></div></div>'
			)
        });
		 $('.postComment').attr('data-cid' , postid);
		 $('.postComment').attr('data-ctype' , type);

		 $('.postComment').click(function(e) {
		 	e.preventDefault();
		 	var id = $(this).attr("data-cid");
		 	var type = $(this).attr("data-ctype");

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
						if(type==1){
							$("[data-did='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
						if(type==2){
							$("[data-postdid='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
						if(type==3){
							$("[data-comid='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
					}
				},
				error: function(e){
					console.log(e);
				}

			});
		 });
	}

	var userid = '<?php echo $user[0]['id'];?>';
	var followerid = '<?php echo $users[0]['id'];?>';
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>mimo/checkfollow',
		data:{
			userid:userid,
			followerid:followerid
		},
		success: function(s){
			var check = JSON.parse(s)
			if(check.status==true){
				
				$("#follow").children("span").text(" Unfollow");
				$("#follow").removeClass("follow");
				$("#follow").addClass("unfollow");
				$("#follow").children("i").addClass("fa-times-circle");
				$("#follow").children("i").removeClass("fa-bell-o");
			
				$("a.unfollow").bind("click",function(){     
					$(this).children("a.unfollow span").text(" Follow");
					$(this).children("i").removeClass("fa-times-circle");
					$(this).children("i").addClass("fa-bell-o");
					$(this).removeClass("unfollow");
					$(this).addClass("follow");
				});
				
			}else{
				
				$("a.follow").bind("click",function(){
					$(this).children("span").text(" Unfollow");
					$(this).removeClass("follow");
					$(this).addClass("unfollow");
					$(this).children("i").addClass("fa-times-circle");
					$(this).children("i").removeClass("fa-bell-o");
				});
	  
			}
		},
		error: function(e){
			console.log(e)
		}
	});

	$('#follow').click(function(e) {
		e.preventDefault();
		var userid = '<?php echo $user[0]['id'];?>';
		var followerid = '<?php echo $users[0]['id'];?>';
		$.ajax({
			type:'POST',
			url: '<?php echo base_url() ?>mimo/follow',
			data:{
				userid:userid,
				followerid:followerid
			},
			success: function(s){
				var f = JSON.parse(s)
				console.log(f)
				$('h6.followers').html('<h6 style="padding: 0 2.2em" class="followers profile text-center"><b style="color:#ffa31a"><i class="fa fa-users"></i> Followers:</b> <br />'+f.followers+' People</h6>')
			},
			error: function(e){
				console.log(e)
			}
		});
	});
	
});
</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>

