			<?php 
				foreach ($viewedUser['MatrimonyUser'] as $key=>$value) {

					if ($value == '') {
						$viewedUser['MatrimonyUser'][$key] = $dataEmptyMessage;
					}
				}
			?>
			<div class="homeNews" style=" border: 0;">
													
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Matrimony Id')); ?>
								</td>
									
								<td>
									<?php echo h("AKPG".$viewedUser['MatrimonyUser']['matrimonyId']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('name')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['AkpageUser']['name']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('surname')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['AkpageUser']['surname']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Profile For')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['MatrimonyUser']['profileFor']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('gothra')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['MatrimonyUser']['gothra']); ?>
								</td>
							</tr>
								
								<tr>
								<td class="capitalize">
									<?php echo __(h('marital Status')); ?>
								</td>
									
								<td>
									<?php 
										$arr = array("Unmarried", "Widower", "Divorced", "Awaiting divorce");
										if ($viewedUser['MatrimonyUser']['maritalStatus'] == $dataEmptyMessage ) {
											echo __($dataEmptyMessage);
										}else {
											echo h($arr[$viewedUser['MatrimonyUser']['maritalStatus']]); 
										}
									?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('smoking')); ?>
								</td>
									
								<td>
									<?php echo ($viewedUser['MatrimonyUser']['smoking'] == 1)? "Yes" : "No"; ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('drinking')); ?>
								</td>
									
								<td>
									<?php echo ($viewedUser['MatrimonyUser']['drinking'] == 1)? "Yes" : "No"; ?>
								</td>
							</tr>
								
							<tr>
								<td class="capitalize">
									<?php echo __(h('height')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['MatrimonyUser']['height']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('weight')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['MatrimonyUser']['weight']); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('About Me')); ?>
								</td>
									
								<td>
									<?php echo h($viewedUser['MatrimonyUser']['aboutMe']); ?>
								</td>
							</tr>
							
						</table>

				
					</div>
			</div>