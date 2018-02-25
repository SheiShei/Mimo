<div class="modal fade" id="addVideo" tabindex="-1" role="dialog" 
		aria-labelledby="audioModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="alert alert-success" id="video-alert">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>Success! </strong>
				     Successfully Posted!!
				</div>
				<!-- Modal Header -->
				<div class="modal-header" style="background-color: #f9f9f9">
					<button type="button" class="close reset" 
						data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center" id="myModalLabel">
						<span><i class="material-icons">mic</i></span>Share a Video
					</h4>
				</div>
            
				<!-- Modal Body -->
				<div class="modal-body" style="background-color: #f9f9f9">
					<form role="form" id="forms">
					<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
						<h5><b>*Upload Video </b><small>(allowed video format: .mp4, .wma)</small></h5>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
									<span class="glyphicon glyphicon-open"></span>
									<input type="file" id="vidUpload" accept="video/*"  name="vidUpload"/>
									</span>
								</span>
								<input type="text" class="form-control" name="files" readonly />
							</div>
									
							<div style="margin: 10px auto">
								<h5><b>*Preview: </b></h5>
								<div class="row" style="margin: 10px auto;">
								<video width="300" height="200" id="vidPreview" controls="" controlsList="noDownload"></video>
								</div>
							</div>
						
						</div>
						<div class="col-md-1">
						</div>
					</div>
					

						<div class="row">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-10">
								<div class="form-group">
								<h5 class="text-center"><b>Video Details</b></h5>
									<p>Title:</p> 
									<input type="text" class="form-control" value="" name="title" placeholder="" />
								</div> 
							</div>	
							
							<div class="col-md-1">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-10">
								<p class="">Description:</p>
									<textarea id="vidDescInput" class="form-control" name="vidDescInput" rows="3" placeholder="Write a video description here."></textarea>
							</div>
							
							<div class="col-md-1">
							</div>
							

						</div>
				</div>
					
							
						<div class="modal-footer">
						
							<button type="button" class="btn btn-default reset" data-dismiss="modal">
								Cancel
							</button>
							<button type="submit" class="btn btn-warning" id="videobtn">
								Release
							</button>
						</div>
			</div>
					
			</form>
	</div>
</div>

<script>
vidUpload.onchange = function(e){
  var vidPreview = document.getElementById('vidPreview');
  vidPreview.src = URL.createObjectURL(this.files[0]);
    URL.revokeObjectURL(this.src);
}
 </script>
 <script>
 $(document).ready(function() {
    $(".reset").click(function() {
		var vidPreview = document.getElementById('vidPreview');
		var vidUpload = document.getElementById('vidUpload');
		var vidDescInput = document.getElementById('vidDescInput');
		 $("input").val("");
		 $("textarea#vidDescInput").val("");
		vidUpload.val = ("");
		vidPreview.src = ("");
		
    });
});
 </script>
  <script>
 $(document).ready(function() {
$('#videobtn').attr('disabled', true);
$('#vidUpload').change(function() {
    if ($('#vidUpload').val() == '')		{
        $('#videobtn').attr('disabled' , true);
    }else{
        $('#videobtn').attr('disabled' , false);
    }
});
});
</script>

		<!--End of Add Audio Modal-->