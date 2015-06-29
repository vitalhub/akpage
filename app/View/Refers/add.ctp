
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		
		<?php echo $this->Form->create('Refer'); ?>
		
		<h4 class="head4"> <?php echo __('Refer A Friend'); ?> </h4>
		
		<div class="align-center"><?php echo $this->Session->flash(); ?></div>
		
		<div class="userContentBox">
			<table class="table table-bordered table-hover">
			<?php if (!$currentUser) { ?>
				
				<tr>
					<td class="capitalize">
						<?php echo __(h('Your Email')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('referrerEmail',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>
				
			<?php } ?>
					
				<tr>
					<td class="capitalize">
						<?php echo __(h('Whom You want to refer ( Email only )')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('referredEmail',array('label'=>false, 'class' => 'form-control')); ?>
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