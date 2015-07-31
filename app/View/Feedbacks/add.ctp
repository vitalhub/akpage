
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		
	<?php echo $this->Form->create('Feedback'); ?>
		
		<h4 class="head4"> <?php echo __('AKpage Feedback form'); ?> </h4>
		
		<div class="align-center"><?php echo $this->Session->flash(); ?></div>
	
	<div class="userContentBox">
			<table class="table table-bordered table-hover">
			<?php if (!$currentUser) { ?>
				<tr>
					<td class="capitalize">
						<?php echo __(h('Your Name')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('name',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>	
				<tr>
					<td class="capitalize">
						<?php echo __(h('Email Id')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('email',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>
			<?php } ?>
				
				<tr>
					<td class="capitalize">
						<?php echo __(h('Is the Information provided is sufficient')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('isSufficient',array('type'=>'radio','options'=>array('Yes','No'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('Over all experience with Akpage')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('overAllExperience',array('type'=>'radio','options'=>array('Not satisfied','Satisfied', 'Good', 'Excellent'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('How did you hear about Akpage')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('hearAkpage', array(					    
							   	
								'type' => 'select',								
        						'multiple' => 'checkbox',								
							    'label' => false,							   
								'div'	=> array('class' =>'custom-checkbox'),								
							    'options' => array('Word of mouth','Through a friend', 'Through relatives', 'Search Engine', 'Other'),							    
								'style' => array('margin-left: 20px;'),
								'default' => 1
							    
							  ));?>
						
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('Use this space for any other additional comments')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('otherComments',array( 'type' => 'textarea' ,'label'=> false, 'class' => 'form-control capitalize')); ?>
					</td>
				</tr>
				
				<tr>
					<td class="capitalize">
						<?php echo __(h('Suggestions.. Your suggestions are valuable for us to imrove the service')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('suggestions',array( 'type' => 'textarea' ,'label'=> false, 'class' => 'form-control capitalize')); ?>
					</td>
				</tr>
			</table>
			
			<div class="align-right btm-margin">
				<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
				<?php echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../users/home\''
						)); ?>
				
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>	
</div>	