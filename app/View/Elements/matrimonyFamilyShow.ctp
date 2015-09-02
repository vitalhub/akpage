
		<?php 
			$familyDetails = json_decode($viewedUser['MatrimonyUser']['familyDetails'],true);
			
			if ($familyDetails) {
				foreach ($familyDetails as $key=>$value) {
						
					if ($value == '') {
						$familyDetails[$key] = $dataEmptyMessage;
					}
				}
			}
			
		 ?>
		
			<div class="homeNews" style=" border: 0;">
			
			<?php if ($familyDetails) { ?>
													
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Father Name')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['fatherName']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Mother Name')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['motherName']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Brothers')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['brothers']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('sisters')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['sisters']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Family Status')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['familyStatus']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Family Type')); ?>
								</td>
									
								<td>
									<?php echo h($familyDetails['familyType']); ?>
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