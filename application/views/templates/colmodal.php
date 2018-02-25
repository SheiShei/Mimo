<div class="modal fade" id="collectModal" tabindex="-1" role="dialog" 
		aria-hidden="true" style="margin-top: 100px; margin: auto;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="alert alert-success" id="col-alert">
				    <strong>Success! </strong>
				    Added Successfully!!
				</div>
				<div class="alert alert-danger" id="colec-alert">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <strong>Warning! </strong>
				    Audio Already exists in Collection list!!
				</div>
				<!-- Modal Body -->
				<div class="modal-body" style="background-color: #f9f9f9">
				<button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
					</button>
					
				<h4 class="modal-title text-center" id="myModalLabel">
					Add this audio to:
				</h4>
				<hr />
			<form class="form-inline" style="margin: 10px auto">
				<div class="row">
					<div class="col-md-6">
						<label for="sel1"><span class="material-icons">library_music</span>Select:</label>
						<select class="form-control" id="sel1" style="width: 100%">
							
						</select>
					</div>
					
					<div class="col-md-6">
						<label for="sel1"><span class="material-icons">add_to_photos</span> or Add New:</label>
						<input style="width: 100%" type="text" class="form-control" id="text" placeholder="Add New Collection" />
					</div>
				
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<button type="button" class="btn btn-warning pull-right" id="collecModal">
							OK!
						</button>
					</div>
				</div>
			</form>

				
					</div>
				</div>
			</div>
		</div>

		<script>
		$('#sel1').change(function() {
			if( $(this).val() == 0) {
				$('#text').prop( "disabled", false );
			} else {       
				$('#text').prop( "disabled", true );
				$('#text').val('');
			}
		});
		$('#text').onkeyup(function() {
			if( $(this).val() == 0) {
				$('#sel1').prop( "disabled", false );
				$('#text').val('');
			} else {       
				$('#sel1').prop( "disabled", true  );
			}
		});
		</script>
		<!--End of Add Thought Modal-->