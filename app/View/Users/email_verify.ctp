<?php if(!$currentUser){

	echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>



<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
			<h4 class="head4"> <?php echo __('Please enter your verification code'); ?> </h4>
			<div class="align-center"><?php echo $this->Session->flash(); ?></div>
		    
		    <div class="userContentBox">
				<table class="table table-bordered table-hover">
					<tr>
						<td class="capitalize">
							<?php echo __(h('Verification Code')); ?>
						</td>
						
						<td class="capitalize">
							<?php echo $this->Form->input('verificationCode',array('label'=>false, 'class' => 'form-control'));  ?>
						</td>
					</tr>		
				</table>
											
				<div class="submit align-right btm-margin">
					<?php echo $this->Form->submit('Verify Code', array('class' => array('btn', 'btn-success', 'btn-sm'), 'name'=>'submit', 'div' => false)); ?>
					<?php echo $this->Form->submit('Send Code Again', array('class' => array('btn', 'btn-success', 'btn-sm'), 'name'=>'submit', 'div' => false)); ?>
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

<?php } ?>

