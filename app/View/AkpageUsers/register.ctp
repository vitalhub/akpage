<div class="akpageUsers form">
<?php 	
	echo $this->Form->create('AkpageUser'); ?>
	<fieldset>
		<legend><?php echo __('Akpage User Details'); ?></legend>
	<?php
		//echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
		echo $this->Form->input('dob',array('type'=>'date','label' => 'Date of birth','dateFormat' => 'DMY',
    		'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 10));
		echo $this->Form->input('gender',array('type'=>'radio','options'=>array('Male','Female')));
		echo $this->Form->input('phone');
		//echo $this->Form->input('verificationCode');
		//echo $this->Form->input('promoter');
		//echo $this->Form->input('refererId');
		//echo $this->Form->input('registrationLevel');
		//echo $this->Form->input('loggedIn');
		//echo $this->Form->input('lastLogin');
		//echo $this->Form->hidden('created',array('value'=> $time));
		//echo $this->Form->hidden('modified',array('value'=> $time));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

