<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

<div class="changeEmail">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<legend> Change Email </legend>
	
	<?php echo $this->Form->input('email', array('label' => 'New Email'));  ?>
	
	</fieldset>
	
	<?php echo $this->Form->end('Change',array('type'=>'submit')); ?>

</div>

<?php } ?>
