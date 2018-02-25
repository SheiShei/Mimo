<div class="toplist">
					<?php
					$i = 0;
					foreach($mimoartists as $mimo){
					 $i++;
					echo '
						<div class="media">
						
						<div class="media-left">
							<p class="rank">'.$i.'</p>
						</div>
							
						<div class="media-left">
							<a href="http://localhost/mimo/myStudio?username='.$mimo['username'].'" >
							<div class="media-object rankPic" style="background-image:url('.$mimo['picture'].');"></div>
							</a>
						</div>
						<div class="media-body">
						<h5 class="media-heading"><a href="http://localhost/mimo/myStudio?username='.$mimo['username'].'" class="user" style="color:black;">'.$mimo['username'].'</a><br />
						</h5>
						<h6 id="audDesc" ><i class="fa fa-users" ></i> '.$mimo['followers'].' followers</h6>
						</div>	
		
						</div> ';} ?>
						
						
					</div>