		<div class="homeNews" style=" border: 0;">
			<?php echo $this->Form->create('MatrimonyUser'); ?>
				
				<h5 class="head4 bold" id="family"><?php echo __('Family Details'); ?></h5>
				
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Father Name')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('fatherName',array('type'=>'text','label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Mother Name')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('motherName',array('type'=>'text', 'label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Brothers')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
										$options=array('0','1','2','3','4','5','6','7','8','9','10','>10');
										echo $this->Form->input('brothers', array('options' => $options, 'empty' => __('How Many'), 'div' => false, 'label' => false, 'required' => true, 'class' => 'form-control capitalize'));
									?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('sisters')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
										$options=array('0','1','2','3','4','5','6','7','8','9','10','>10');
										echo $this->Form->input('sisters', array('options' => $options, 'empty' => __('How Many'), 'div' => false, 'label' => false, 'required' => true, 'class' => 'form-control capitalize'));
									?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Family Status')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
										$options=array('Poor'=>'Poor', 'Middle-Class'=>'Middle-Class',  'Upper-Middle-Class'=>'Upper-Middle-Class','Rich'=>'Rich', 'Affluent'=>'Affluent');
										echo $this->Form->input('familyStatus', array('options' => $options, 'empty' => __('Select'), 'div' => false, 'label' => false, 'required' => true, 'class' => 'form-control capitalize'));
									?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Family Type')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
										$options=array('Joint'=>'Joint', 'Nuclear'=>'Nuclear');
										echo $this->Form->input('familyType', array('options' => $options, 'empty' => __('Select'), 'div' => false, 'label' => false, 'required' => true, 'class' => 'form-control capitalize'));
									?>
								</td>
							</tr>
							
						</table>
					</div>	
					
					<h5 class="head4 bold" id="family"><?php echo __('Proffessional Details'); ?></h5>
				
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Employed In')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
										$options=array('Government'=>'Government', 'Private'=>'Private', 'Business'=>'Business', 'Defence'=>'Defence', 'Self Employed'=>'Self Employed');
										echo $this->Form->input('employedIn', array('options' => $options, 'empty' => __('Select'), 'div' => false, 'label' => false, 'required' => true, 'class' => 'form-control capitalize'));
									?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('occupation')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('occupation',array('type'=>'text','label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('company')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('company',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('designation')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('designation',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('businessName')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('businessName',array('type'=>'text','label'=> false, 'required' => false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('totalAnnualIncome')); ?>
								</td>
									
								<td class="capitalize">
									<?php 
									
									$options=array('Below 50,000' => 'Below 50,000', '50,000 - 1 Lakh' => '50,000 - 1 Lakh', '1 Lakh - 2 Lakh' => '1 Lakh - 2 Lakh', '2 Lakh - 3 Lakh' => '2 Lakh - 3 Lakh', '3 Lakh - 4 Lakh' => '3 Lakh - 4 Lakh', '4 Lakh - 5 Lakh' => '4 Lakh - 5 Lakh'
											, '5 Lakh - 6 Lakh' => '5 Lakh - 6 Lakh', '6 Lakh - 7 Lakh' => '6 Lakh - 7 Lakh', '7 Lakh - 8 Lakh' => '7 Lakh - 8 Lakh', '8 Lakh - 9 Lakh' => '8 Lakh - 9 Lakh', '9 Lakh - 10 Lakh' => '9 Lakh - 10 Lakh', '10 Lakh - 15 Lakh' => '10 Lakh - 15 Lakh'
											, '15 Lakh - 20 Lakh' => '15 Lakh - 20 Lakh', '20 Lakh - 25 Lakh' => '20 Lakh - 25 Lakh', '25 Lakh - 30 Lakh' => '25 Lakh - 30 Lakh', '30 Lakh - 35 Lakh' => '30 Lakh - 35 Lakh', '35 Lakh - 40 Lakh' => '35 Lakh - 40 Lakh'
											, '40 Lakh - 45 Lakh' => '40 Lakh - 45 Lakh', '45 Lakh - 50 Lakh' => '45 Lakh - 50 Lakh', 'Above 50 Lakh' => 'Above 50 Lakh');
									
									echo $this->Form->input('totalAnnualIncome',array('type'=>'select', 'options' => $options, 'label'=> false, 'empty' => __('Select Income'), 'required' => true, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
						</table>
					</div>
					
					<h5 class="head4 bold" id="family"><?php echo __('Educational Details'); ?></h5>
				
					<div class="matrimonyUsers form" style="padding: 10px;">
					
						<table class="table table-bordered table-striped table-hover">
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('qualification')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('qualification',array('type'=>'text','label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('college Name')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('collegeName',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('university')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('university',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('achievements')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('achievements',array('type' => 'textarea', 'label'=> false, 'class' => 'form-control capitalize')); ?>
								</td>
							</tr>
						</table>
						<div class="align-right">
							<?php echo $this->Form->submit(__('Proceed'), array('class' => array('btn', 'btn-success', 'btn-md'), 'div' => false)); ?>
							<?php //echo $this->Form->end(array('label' => __('Proceed'), 'class' => array('btn', 'btn-success', 'btn-md'), 'div' => false)); ?>
							<?php //echo $this->Form->end(array('label' => __('Cancel'), 'class' => array('btn', 'btn-danger', 'btn-md'), 'div' => false)); ?>
						</div>
						<?php echo $this->Form->end(__('')); ?>
					</div>
				</div>