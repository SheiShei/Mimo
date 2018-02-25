  <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="<?php echo base_url('');?>">
				<?php $this->load->view('include/mimologo')?>
				<strong style="margin-top: -5px;">MimO</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
			 <form class="navbar-form navbar-left" action="<?php echo base_url('search'); ?>">
						<!--Search Bar -->
                        <input class="form-control searchbar" id="searchbar" type="text" placeholder="Search" autocomplete="off">
					<ul class="list-group searchresult" style="position: absolute; width:400px; z-index:100"></ul>
                </form>
				<!-- Nav Items -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="presentation" role="presentation"><a href="<?php echo base_url('');?>" class="bar">
			<i class="material-icons bar">speaker</i><p class="bar hidden-sm"> Music Hall</p></a></li>
                    <li class="presentation"><a class="presentation" href="<?php echo base_url('browse');?>" class="bar">
			<i class="material-icons bar">equalizer</i><p class="hidden-sm bar"> Browse</p></a></li>
                    <li role="presentation"><a href="<?php echo base_url('myStudio?username='.$users[0]['username'].' ');?>" class="bar">
						<i class="material-icons bar">headset_mic</i><p class="hidden-sm bar">My Studio</p></a></li>
					
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" 		class="bar">
						<i class="material-icons">notifications </i><span class="label label-warning notifnum"></span></a>
						 <ul class="dropdown-menu" role="menu" style="width: 350px; max-height: 450px; overflow: auto">
							<li role="presentation" class="notif">
								<h6 class="dropdown-header text-center"><b>NOTIFICATIONS</b></h6></li>
								
								<!--NOTIF SECTION-->
								
							<!--END-->
							

						</ul>
					</li>
					
					 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" class="bar">
						<i class="material-icons">settings</i> <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                     <li role="presentation">
							        	<a href="<?php echo base_url('settings');?>">Account Settings</a></li>
                            <li role="presentation"><a href="<?php echo base_url('mimo/logout');?>">Logout</a></li>

						</ul>
                </ul>
            </div>
        </div>
    </nav>
<script type="text/javascript">
var userid = '<?php echo $users[0]['id'];?>'
$(document).ready(function(){
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>notification/notifstatus',
		data:{
			userid:userid
		},
		success: function(s){
			n = JSON.parse(s)
			console.log(n)
			$('.notifnum').html(n.status)
		},
		error: function(e){
			console.log(e)
		}
	})
	$.ajax({
		type:'POST',
		url: '<?php echo base_url() ?>notification/getnotif',
		data:{
			userid:userid
		},
		success: function(s){
			var notif = JSON.parse(s)
			console.log(notif)
			$.each(notif, function(index) {
				if(notif[index].status==1){
				
					if(notif[index].type==5){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> followed you.<span class="fa fa-check-circle pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==6){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> Unfollowed you.<span class="fa fa-check-circle pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==1){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> mentioned you on a post..<span class="fa fa-tag nicon pull-right"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==2){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> liked your post.<span class="fa fa-heart pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==3){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> commented on your post.<span class="fa fa-commenting pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==4){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> mentioned you on a comment.<span class="fa fa-commenting pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
				}
				else{
					if(notif[index].type==5){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big><b> followed you.</b><span class="fa fa-check-circle pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==6){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> <b>Unfollowed you.</b><span class="fa fa-check-circle pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==1){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big><b> mentioned you on a post.</b><span class="fa fa-tag nicon pull-right"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==2){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big> <b>liked your post.</b><span class="fa fa-heart pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==3){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big><b> commented on your post.</b><span class="fa fa-commenting pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
					if(notif[index].type==4){
						$('<li role="presentation" style=""><a data-nid="'+notif[index].id+'" href="'+notif[index].notifurl+'" class="nlock" style="padding:10px"><div class="media"><div class="media-left media-top"><div class="media-object commentPic" style="background-image:url('+notif[index].picture+');"></div></div><div class="media-body"><h6 class="media-heading"><big style="color: #008ae6"><b>'+notif[index].username+'</b></big><b> mentioned you on a comment.</b><span class="fa fa-commenting pull-right nicon"></h6><h6 class="media-heading"><small>'+notif[index].date+'</small><h6></div></div></a></li>').insertAfter("li.notif");
					};
				}




			})
 				 $('[data-nid]').click(function() {
					var notifid = $(this).attr('data-nid');
					$.ajax({
						type:'post',
						url:'<?php echo base_url() ?>notification/notifchangestatus',
						data:{
							notifid:notifid
						},
						success: function(s){
							console.log(s)
						},
						error: function(e){
							console.log(e)
						}

					})
				})
		},
		error: function(e){
			console.log(e)
		}
	})

})
</script>