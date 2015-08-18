			<div class="homeNews" style=" border: 0;">
				
				<?php echo $this->Form->create('AkpageUser'); ?>
					
					<div class="akpageUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('name')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('name',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('surname')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('surname',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Date of Birth')); ?>
								</td>
									
								<td class="capitalize">
									<?php //echo $this->Form->input('dob',array('type'=>'date','label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						//'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 10, 'class' => 'form-control capitalize col-xs-3'));	?>
				    						
				    				<?php echo $this->Form->input('dob',array('type'=>'date','label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 10, 'class' => 'form-control capitalize col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?>
				    						
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Gender')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('gender',array('type'=>'radio','options'=>array('Male','Female'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('phone')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('phone',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
						</table>
						<div class="align-right">
							<?php echo $this->Form->submit(__('Next'), array('class' => array('btn', 'btn-success', 'btn-md'), 'div' => false)); ?>
							<?php //echo $this->Form->end(array('label' => __('Cancel'), 'class' => array('btn', 'btn-danger', 'btn-md'), 'div' => false)); ?>
						</div>
						<?php echo $this->Form->end(__('')); ?>
					</div>
			</div>