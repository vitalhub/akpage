<div class="akpageUsers form">
<?php echo $this->Form->create('AkpageUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Akpage User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
		echo $this->Form->input('dob');
		echo $this->Form->input('gender');
		echo $this->Form->input('phone');
		echo $this->Form->input('verificationCode');
		echo $this->Form->input('promoter');
		echo $this->Form->input('refererId');
		echo $this->Form->input('registrationLevel');
		echo $this->Form->input('loggedIn');
		echo $this->Form->input('lastLogin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AkpageUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AkpageUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Akpage Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
