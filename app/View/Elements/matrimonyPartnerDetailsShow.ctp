	
		<?php //$partnerDetails = json_decode($viewedUser['MatrimonyUser']['partnerDetails'],true); ?>
			
			<div class="homeNews" style=" border: 0;">
													
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('qualification')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['partnerQualification']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('height')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['partnerHeight']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('from Age')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['fromAge']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('to Age')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['toAge']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('state')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['partnerState']); ?>
								</td>
							</tr>
							
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('city')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['partnerCity']); ?>
								</td>
							</tr>
							
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('smoking')); ?>
								</td>
									
								<td>
									<?php echo ($partnerDetails['partnerSmoking'] == 1)? "Yes": "No"; ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('drinking')); ?>
								</td>
									
								<td>
									<?php echo ($partnerDetails['partnerDrinking'] == 1)? "Yes": "No"; ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('about Partner')); ?>
								</td>
									
								<td>
									<?php echo h($partnerDetails['aboutPartner']); ?>
								</td>
							</tr>
							
						</table>

				
					</div>
			</div>