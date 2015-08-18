			<?php 
				$educationalDetails = json_decode($viewedUser['MatrimonyUser']['educationalDetails'],true); 
				
				if ($educationalDetails) {
					foreach ($educationalDetails as $key=>$value) {
					
						if ($value == '') {
							$educationalDetails[$key] = $dataEmptyMessage;
						}
					}
				}
				
				
				?>
			
			<div class="homeNews" style=" border: 0;">
			
			<?php if ($educationalDetails) { ?>
				
									
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('collage name')); ?>
								</td>
									
								<td>
									<?php echo h($educationalDetails['collegeName']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('university')); ?>
								</td>
									
								<td>
									<?php echo h($educationalDetails['university']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Achievements')); ?>
								</td>
									
								<td>
									<?php echo h($educationalDetails['achievements']); ?>
								</td>
							</tr>
							
						</table>
						
						
					</div>
					
					<?php }else {
							echo "<p class='userDataEmpty'>";	
							echo __("Sorry...! These Details Are Not Provided By The User.");
							echo "</p>";
					}?>
			</div>