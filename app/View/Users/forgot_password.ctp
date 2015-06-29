

<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<div class="forgotPassword">
	<?php echo $this->Form->create('User'); ?>
	<h4 class="head4"> <?php echo __('Forgot Password'); ?> </h4>
	
	<div class="align-center"><?php echo $this->Session->flash(); ?></div>
		<div class="userContentBox">
			<table class="table table-bordered table-hover">
				<tr>
					<td class="capitalize">
						<?php echo __(h('Enter your registered email')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('email',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>	
				
						<?php //echo $this->Form->hidden('password',array('value'=>'abc123', 'label'=>false, 'class' => 'form-control')); ?>
			</table>
			
			<div class="align-right btm-margin">
				<?php echo $this->Form->submit('Send Password', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
				<?php echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../users/login\''
						)); ?>
				
			</div>
			<?php echo $this->Form->end(); ?>
			</div>	
		</div>
	</div>
</div>

