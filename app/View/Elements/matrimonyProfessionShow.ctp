
		<?php $professionalDetails = json_decode($viewedUser['MatrimonyUser']['professionalDetails'],true); ?>
		
			<div class="homeNews" style=" border: 0;">
									
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Employed In')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['employedIn']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('occupation')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['occupation']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('company')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['company']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('designation')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['designation']); ?>
								</td>
							</tr>
								
							<tr>
								<td class="capitalize">
									<?php echo __(h('If business, business Name')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['businessName']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Total Annual Income')); ?>
								</td>
									
								<td>
									<?php echo h($professionalDetails['totalAnnualIncome']); ?>
								</td>
							</tr>
							
						</table>
						
				
					</div>
			</div>