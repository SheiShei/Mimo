<body style="background-color: #d9d9d9">

	<!--This is below Top Navigation Section -->
<div class="container">
	<!-- Left Nav Section -->
<div class="row" >
		<div id="leftnav" class="col-md-3 col-sm-5" style="margin-left: 15px;margin-right: 15px;">
			<div class="row">
				
				<div class="col-md-12" style="background-color:grey; color: white; padding: 8px;">
					<h3 style="color: #ffb84d"><i class="glyphicon glyphicon-search"></i> &nbsp;Search Result:</h3>
					<hr />
					<h6>You have searched for: </h6>
					<h4 class="text-center"><b><?php echo $q;?></b></h4>
				</div>
			
			</div>
		</div>
	
	<!-- Search -->
	
		<div class="col-md-8 belowtn col-xs-12 col-sm-7" style="margin-left: 10px; margin-top: 25px; margin-right: 10px;">
			
			<!-- Dito lalabas -->
			<div class="row">
				<ul class="nav nav-tabs nav-justified searchtab">
						<!-- COLLECTIONS, ALBUMS, THOUGHTS, and FAVORITES TABS-->
						<li class="active"><a data-toggle="tab" href="#sartist">&nbsp;Artist</a></li>
						<li><a data-toggle="tab" href="#sthought">&nbsp;Thoughts</a></li>
						<li><a data-toggle="tab" href="#saudios">&nbsp;Audios</a></li>
						<li><a data-toggle="tab" href="#svids">&nbsp;Videos</a></li>
				</ul>

					<div class="tab-content">
						<?php $this->load->view('templates/commentModal');?>
						
						<!-- ARTIST -->
							<div id="sartist" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10 artist">
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
   
   
						<!-- AUDIOS-->
							<div id="sthought" class="tab-pane fade" >
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10 thoughts">
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
							
							
							<!-- THOUGHTS-->
							<div id="saudios" class="tab-pane fade">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10 audios">
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>	
							
							<!-- FAVORITES-->
							<div id="svids" class="tab-pane fade">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10 videos">
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
					</div>
					

	</div>
		
			</div>
			<!-- End of dito lalabas -->
		</div>
				
			
	
	
<!-- Third Column Div (Beside Contents)-->
	<div class="col-md-1 mod">
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
$(document).ready(function(){
	var toSearch = '<?php echo $q;?>';
	var user = '<?php echo $users[0]['id'];?>'
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>search/artist',
		data:{
			toSearch:toSearch
		},
		success: function(s){
			var res = JSON.parse(s)
			console.log(res)
			if(res.id==="error"){
				//Edit mo to
        		$('.artist').html(' <h5 class="text-center"><span class="fa fa-search"></span> No artist found for <b>'+toSearch+'</b></h5>')
        	}
        	else{
				$.each(res, function(index) {
					$('.artist').html($('.artist').html()+'<div class="searchbox"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" ><div class="media-object srchPic" style="background-image:url('+res[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" class="user">'+res[index].username+'</a><small> ( '+res[index].followers+' followers )</small><a data-id="'+res[index].username+'" class="btn btn-info btn-sm pull-right">Visit Studio</a><br /><small><small>'+res[index].career+'</small></small></h4></div></div></div>'
						);

						$('[data-id]').click(function(e) {
							e.preventDefault()
							var userid = $(this).attr('data-id');
							window.location = "http://localhost/mimo/myStudio?username="+userid;
						});


				});
			}
		},
		error: function(e){
			console.log(e)
		}
	});
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>search/thoughts',
		data:{
			toSearch:toSearch
		},
		success: function(s){
			var res = JSON.parse(s)
			console.log(res)
			if(res.id==="error"){
				//Edit mo to
        		$('.thoughts').html('  <h5 class="text-center"><span class="fa fa-search"></span> No shared thoughts found for <b>'+toSearch+'</b></h5>')
        	}
        	else{
				$.each(res, function(index) {
					$('.thoughts').html($('.thoughts').html()+'<div data-alert="'+res[index].id+'" class="alert alert-danger report-alert" ></div><div class="searchbox"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" ><div class="media-object srchThoughtPic" style="background-image:url('+res[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" class="user">'+res[index].username+' </a><a data-reportpost="'+res[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><small><small>'+res[index].posted_at+'</small></small></h4><h5 id="audDesc">'+res[index].body+'</h5></div><div id="likesection"><div class="btn-grp btn-group-justified"><a data-thoughtslikeid="'+res[index].id+'" id="likeBtn" type="button" class="btn like"><span class="fa fa-heart-o"></span> Like <small><small>('+res[index].likes+')</small></small></a><a data-thoughtscommentid="'+res[index].id+'" class="commentBtn btn comment" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+res[index].comments+')</small></small></a></div></div></div></div>'


						);
						$('.report-alert').hide()
								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:res[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-thoughtslikeid='"+res[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+res[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})
					$('[data-thoughtslikeid]').click(function(e) {
						e.preventDefault()
						var postid = $(this).attr('data-thoughtslikeid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/likes',
							data:{
								postid:postid
							},
							success: function(s){
								var likes = JSON.parse(s);
								if(likes.stats=='unlike'){
												$("[data-thoughtslikeid='"+postid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-thoughtslikeid='"+postid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
							},
							error: function(e){
								console.log(e);
								alert('error');
							}
						});
					});
					$('[data-thoughtscommentid]').click(function(e) {
						e.preventDefault()
						$('.commentatorDiv').html('')
						var postid = $(this).attr('data-thoughtscommentid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/getcomments',
							data:{
								postid:postid
							},
							success: function(s){
								var comments = JSON.parse(s)
        						console.log(comments);
        						//call showCommentModal function to display all comments
        						showCommentModal(comments,postid,1);
							},
							error: function(){
								console.log(e)
							}
						});
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
		error: function(e){
			console.log(e)
		}
	});
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>search/audios',
		data:{
			toSearch:toSearch
		},
		success: function(s){
			var res = JSON.parse(s)
			console.log(res)
			if(res.id==="error"){
				//Edit mo to
        		$('.audios').html(' <h5 class="text-center"><span class="fa fa-search"></span> No audios found for <b>'+toSearch+'</b></h5>')
        	}
        	else{
				$.each(res, function(index) {
					$('.audios').html($('.audios').html()+'<div data-aalert="'+res[index].id+'" class="alert alert-danger report-aalert" ></div><div class="searchbox"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" ><div class="media-object srchAlbumPic" style="background-image:url('+res[index].cover+');"></div></a></div><div class="media-body"><h4 style="color: black" class="media-heading">'+res[index].title+'<a data-areportpost="'+res[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><small style="">( by: <a href="http://localhost/mimo/myStudio?username='+res[index].username+'""> '+res[index].username+'</a> )</small></h4><h6><b> Genre:</b> '+res[index].genre+'</h6><h6><b> Year:</b> 2017</h6><p id="audDesc">'+res[index].about+'</p><div class="row" ><div class="col-md-12"><audio data-audioend="'+res[index].id+'" id="audio" controls controlsList="nodownload" width="100%"><source src="'+res[index].path+'" type="audio/mpeg">Your browser does not support the audio element.</audio></div></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a data-audioslikeid="'+res[index].id+'" id="likeBtn" type="button" class="btn like"><span class="fa fa-heart-o"></span> Like <small><small>('+res[index].likes+')</small></small></a><a  data-audioscommentid="'+res[index].id+'" class="commentBtn btn comment" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+res[index].comments+')</small></small></a><a data-audioendplay="'+res[index].id+'" class="btn view disabled"><span class="glyphicon glyphicon-play "></span><small>'+res[index].views+'</small></a><a data-audioscollectionid="'+res[index].id+'" class="btn"><span class="fa fa-plus-square collect" data-toggle="tooltip" data-placement="top" title="Add To Collections"></span></a></div></div></div></div>'


					);
						$('.report-aalert').hide()

								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:res[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-audioslikeid='"+res[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+res[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})
					$('[data-audioslikeid]').click(function(e) {
						e.preventDefault()
						var postid = $(this).attr('data-audioslikeid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/likes',
							data:{
								postid:postid
							},
							success: function(s){
								var likes = JSON.parse(s);
								if(likes.stats=='unlike'){
												$("[data-audioslikeid='"+postid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-audioslikeid='"+postid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
							},
							error: function(e){
								console.log(e);
								alert('error');
							}
						});
					});
					$('[data-audioscommentid]').click(function(e) {
						e.preventDefault()
						$('.commentatorDiv').html('')
						var postid = $(this).attr('data-audioscommentid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/getcomments',
							data:{
								postid:postid
							},
							success: function(s){
								var comments = JSON.parse(s)
        						console.log(comments);
        						//call showCommentModal function to display all comments
        						showCommentModal(comments,postid,2);
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
							      			$("[data-audioendplay='"+audioid+"']").html('<span class="glyphicon glyphicon-play "></span><small>'+views.views+'</small>');
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
		error: function(e){
			console.log(e)
		}
	});
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>search/videos',
		data:{
			toSearch:toSearch
		},
		success: function(s){
			var res = JSON.parse(s)
			console.log(res)
			if(res.id==="error"){
				//Edit mo to
        		$('.videos').html('  <h5 class="text-center"><span class="fa fa-search"></span> No video found for <b>'+toSearch+'</b></h5>')
        	}
        	else{
				$.each(res, function(index) {
					$('.videos').html($('.videos').html()+'<div data-vlert="'+res[index].id+'" class="alert alert-danger report-valert" ></div><div class="searchbox"><div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+res[index].username+'" ><div class="media-object srchThoughtPic" style="background-image:url('+res[index].picture+');"></div></a></div><div class="media-body"><h4 class="media-heading">'+res[index].name+'<br /><a data-vreportpost="'+res[index].id+'" class="btn pull-right"><span class="fa fa-exclamation-circle" title="Report this Post!"></span></a><small>by: <a href="http://localhost/mimo/myStudio?username='+res[index].username+'">'+res[index].username+'</a></small></h4><p id="audDesc">'+res[index].description+'</p><div class="row" ><div class="col-md-12"><video data-videoend="'+res[index].id+'" src="'+res[index].url+'" style="width:100%; height: 200px" controls controlsList="nodownload"></video></div></div></div><div id="likesectionaud"><div class="btn-grp btn-group-justified"><a data-videoslikeid="'+res[index].id+'" id="likeBtn" type="button" class="btn like"><span class="fa fa-heart-o"></span> Like <small><small>('+res[index].likes+')</small></small></a><a data-videoscommentid="'+res[index].id+'" class="commentBtn btn comment" data-toggle="modal" data-target="#commentModal"><span class="fa fa-commenting-o"></span> Comment <small><small>('+res[index].comments+')</small></small></a><a data-videoendplay="'+res[index].id+'" class="btn view disabled"><span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small> '+res[index].plays+'</small></a></div></div></div></div>'

					);
					$('.report-valert').hide()
								$.ajax({
									type:'POST',
									url:'<?php echo base_url() ?>mimo/checklikes',
									data:{
										postid:res[index].id,
										userid:user
									},
									success: function(s){
										var stat = JSON.parse(s)
										console.log(stat)
										if(stat.stat=='like'){
											$("[data-videoslikeid='"+res[index].id+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+res[index].likes+')</small></small>');
										}
									},
									error: function(e){
										console.log(e)
									}

								})
					$('[data-videoslikeid]').click(function(e) {
						e.preventDefault()
						var postid = $(this).attr('data-videoslikeid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/likes',
							data:{
								postid:postid
							},
							success: function(s){
								var likes = JSON.parse(s);
								if(likes.stats=='unlike'){
												$("[data-videoslikeid='"+postid+"']").html('<span class="fa fa-heart-o"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
											else{
												$("[data-videoslikeid='"+postid+"']").html('<span class="fa fa-heart"></span> Like <small><small>('+likes.likes+')</small></small>');
											}
							},
							error: function(e){
								console.log(e);
								alert('error');
							}
						});
					});
					$('[data-videoscommentid]').click(function(e) {
						e.preventDefault()
						$('.commentatorDiv').html('')
						var postid = $(this).attr('data-videoscommentid');
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>mimo/getcomments',
							data:{
								postid:postid
							},
							success: function(s){
								var comments = JSON.parse(s)
        						console.log(comments);
        						//call showCommentModal function to display all comments
        						showCommentModal(comments,postid,3);
							},
							error: function(){
								console.log(e)
							}
						});
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
							      			$("[data-videoendplay='"+videoid+"']").html('<span style="font-size: 12px;" class="glyphicon glyphicon-play"></span><small> '+views.views+'</small>');
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
		error: function(e){
			console.log(e)
		}
	});
	function showCommentModal(comments,postid,type){
		$('.h4').html('<span></span> Comments<small> on ... post</small>')
		 $('#commentModal').modal('show')
		 $.each(comments, function(index) {
	        $('.commentatorDiv').html($('.commentatorDiv').html()+'<div class="media"><div class="media-left"><a href="http://localhost/mimo/myStudio?username='+comments[index].username+'"><div class="media-object commentPic" style="background-image:url('+comments[index].picture+');"></div></a></div><div class="media-body"><h5 class="media-heading"><a href="http://localhost/mimo/myStudio?username='+comments[index].username+'" style="font-weight:bold" class="user">'+comments[index].username+'</a><small><small> '+comments[index].posted_at+'</small></small></h5><h6>'+comments[index].comment+'</h6></div></div>'
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
							$("[data-thoughtscommentid='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
						if(type==2){
							$("[data-audioscommentid='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
						if(type==3){
							$("[data-videoscommentid='"+comment[0].id+"']").html('<span class="fa fa-commenting-o"></span> Comment <small><small>('+comment[0].comments+')</small></small>');
						}
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
