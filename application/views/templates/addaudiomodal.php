<div class="modal fade" id="addAudio" tabindex="-1" role="dialog" 
		aria-labelledby="audioModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="alert alert-success" id="audio-alert">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>Success! </strong>
				    Audio added successfully!!
				</div>
				<!-- Modal Header -->
				<div class="modal-header" style="background-color: #f9f9f9">
					<button type="button" class="close reset" 
						data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title text-center" id="myModalLabel">
						<span><i class="material-icons">mic</i></span>Release Audio
					</h4>
				</div>
            
				<!-- Modal Body -->
				<div class="modal-body" style="background-color: #f9f9f9">
					<form role="form" id="form">
					<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
						<h5 ><b>*Upload Audio </b><small>(allowed audio format: .mp3, .ogg, .wav)</small></h5>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
									<span class="glyphicon glyphicon-open"></span>
									<input type="file" id="audioUpload" accept="audio/*" name="file"/>
									</span>
								</span>
								<input type="text" class="form-control" readonly />
							</div>
									
							<div style="margin: 10px auto">
								<h5><b>*Preview: </b></h5>
								<audio width="100%" id="audPreview" controls="" controlsList="noDownload"></audio>
							</div>
						
						</div>
						<div class="col-md-1">
						</div>
					</div>
					

						<div class="row">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-7">
								<div class="form-group">
								<h5 class="text-center"><b>Audio Details</b></h5>
									<p>Title:</p> 
									<input type="text" class="form-control" value="" placeholder="" id="title" name="title"/>
									<p>Genre:</p> 
									<select class="form-control" id="selectGenre" name="genre">
										<option value=" None">None</option>
										<option value=" Alternative">Alternative</option>
										<option value=" Blues">Blues</option>
										<option value=" Classical">Classical Music</option>
										<option value=" Country Music">Country Music</option>
										<option value=" Dance Music">Dance Music</option>
										<option value=" Easy Listening">Easy Listening</option>
										<option value=" Electronic Music">Electronic Music</option>
										<option value=" European Music (Folk / Pop)">European Music (Folk / Pop)</option>
										<option value=" HipHop / Rap">Hip Hop / Rap</option>
										<option value=" Indie Music">Indie Pop</option>
										<option value=" Inspirational (incl. Gospel)">Inspirational (incl. Gospel)</option>
										<option value=" Asian Pop (J-Pop, K-pop, OPM)">Asian Pop (J-Pop, K-pop, OPM)</option>
										<option value=" Jazz">Jazz</option>
										<option value=" Latin Music">Latin Music</option>
										<option value=" New Age">New Age</option>
										<option value=" Opera">Opera</option>
										<option value=" Pop (Popular music)">Pop (Popular music)</option>
										<option value=" R&B / Soul">R&B / Soul</option>
										<option value=" Reggae">Reggae</option>
										<option value=" Rock">Rock</option>
										<option value=" World Music / Beats">World Music / Beats</option>
										</select>
								</div>
							</div>	
							
							<div class="col-md-3">
							<div class="form-group">
								<h5 class="text-center"><b>Audio Art</b></h5>
									<br />
										<div class="input-group">
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													<span class="glyphicon glyphicon-picture"></span> Add
													<input type="file" id="uploadAudioImg" name="uploadAudioImg" accept="image/*">
												</span>
											</span>
											<input type="text" class="form-control" readonly />
										</div>
									<div>
									<img id="imgPreview" style="width: 50%; margin: 5px auto" />
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
								<p class="">Description:</p>
									<textarea id="audDescInput"class="form-control" name="audDescInput" rows="3" placeholder="Write the audio description here."></textarea>
							</div>
							
							<div class="col-md-1">
							</div>
							

						</div>
				</div>
					
							
						<div class="modal-footer">
						
							<button type="button" class="btn btn-default reset" data-dismiss="modal">
								Cancel
							</button>
							<button type="submit" class="btn btn-warning" id="releasebtn">
								Release
							</button>
						</div>
			</div>
					
			</form>
	</div>
</div>

<script>
audioUpload.onchange = function(e){
  var audPreview = document.getElementById('audPreview');
  audPreview.src = URL.createObjectURL(this.files[0]);
  audPreview.onend = function(e) {
    URL.revokeObjectURL(this.src);
  }
}
uploadAudioImg.onchange = function(e){
  var imgPreview = document.getElementById('imgPreview');
  imgPreview.src = URL.createObjectURL(this.files[0]);
}
 </script>
 <script>
 $(document).ready(function() {
    $(".reset").click(function() {
		var audPreview = document.getElementById('audPreview');
		var imgPreview = document.getElementById('imgPreview');
		var audioUpload = document.getElementById('audioUpload');
		var audDescInput = document.getElementById('audDescInput');
		var selectGenre = document.getElementById('selectGenre');
		 $("input").val("");
		 audioUpload.val = ("");
		 audPreview.src = ("");
		 imgPreview.src = ("");
		 $("textarea#audDescInput").val("");
		 selectGenre.options[0].selected = true;
    });
});
 </script>

 <script>
 $(document).ready(function() {
$('#releasebtn').attr('disabled', true);
$('#audioUpload').change(function() {
    if ($('#audioUpload').val() == '')		{
        $('#releasebtn').attr('disabled' , true);
    }else{
        $('#releasebtn').attr('disabled' , false);
    }
});
});
</script>

		<!--End of Add Audio Modal-->