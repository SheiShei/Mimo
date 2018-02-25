<!--Template para sa isang collection-->
<div class="forpanel">
	<?php if($user[0]['id']==$users[0]['id']){ ?>
		<a class="delCol" onclick="deletecol(<?php echo $cl['id']; ?>)" title="Delete Collection"><i class="fa fa-trash-o"></i></a>
	<?php } 
	else if($user[0]['id']!=$users[0]['id']){?>
	<a class="delCol" title="Collection"><i class="fa fa-thumb-tack"></i></a>
	<?php }?>
	<button class="accordion"><i class="fa fa-list-ul"></i>&nbsp;<?php echo $cl['name']; ?>
	</button>
	<div class="panel">
		<table class="table table-stripped text-center">
			<th>
				<td style="font-size: 12px">Title</td>
				<td style="font-size: 12px">Artist</td>
				<td style="font-size: 12px" class="hidden-xs">Genre</td> 
				<td style="font-size: 12px" class="hidden-xs">Year</td>
				<td style="font-size: 12px">Actions</td>
			</th>
			<!--Template to para kada song na nasa collection-->

			<?php foreach ($collectionsongList as $csl) { 
				$con = array('id'=>$csl['user_id']);
				$username = $this->get->read('users',$con,'username')[0]['username'];
			?>

			<tr>
				<td>
					<div class="collectPic" style="background-image:url('<?php echo $csl['cover']; ?>');"></div>
				</td>
				<td><?php echo $csl['title']; ?></td>
				<td><a href="http://localhost/mimo/myStudio?username=<?php echo $username; ?>"><?php echo $username; ?></a></td>
				<td class="hidden-xs"><?php echo $csl['genre']; ?></td>
				<td class="hidden-xs"><?php $phpdate = strtotime( $csl['posted_at'] ); echo date( 'Y', $phpdate ); ?></td>
				<td><a title="Play" href="http://localhost/mimo/mimo/collectionlist?name=<?php echo $cl['id']; ?>" data-source="<?php echo $csl['path']; ?>"><i class="fa fa-play-circle"></i></a>
					<?php if($user[0]['id']==$users[0]['id']){ ?>
					<a onclick="deletecolsong(<?php echo $csl['id']; ?>)" title="Remove from Collection"><i class="fa fa-remove"></i></a><?php }?>

				</td>
			</tr>
			<?php } ?>
			<!--End-->
		</table>
	</div>
</div>
<script type="text/javascript">
function deletecol(colid){
	$('#deleteColModal').modal('show')
	$('#delete-alert').hide()
	$('#yes').click(function() {
		$.ajax({
			type:'POST',
			url:'<?php echo base_url() ?>mimo/deletecollection',
			data:{
				collectionid:colid
			},
			success: function(s){
				console.log(s)
				$("#delete-alert").fadeIn(500, 0);
                    window.setTimeout(function() {
                        $("#delete-alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            $('#deleteColModal').modal('hide');
                            location.reload(true);
                        });
                    }, 1500);

			},
			error: function(e){
				console.log(e)
			}
		})
	})
	
}
function deletecolsong(colid){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url() ?>mimo/deletecollectionsong',
			data:{
				collectionid:colid
			},
			success: function(s){
				console.log(s)
				$("#deletes-alert").fadeIn(500, 0);
                    window.setTimeout(function() {
                        $("#deletes-alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            location.reload(true);
                        });
                    }, 1500);

			},
			error: function(e){
				console.log(e)
			}
		})
	
}
</script>
<!---->