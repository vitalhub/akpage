<div class="matrimonyUsers form">
<?php echo $this->Form->create('MatrimonyUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Matrimony User'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('profilePic');
		echo $this->Form->input('familyDetails');
		echo $this->Form->input('professionalDetails');
		echo $this->Form->input('educationalDetails');
		echo $this->Form->input('otherDetails');
		echo $this->Form->input('partnerDetails');
		echo $this->Form->input('recentVisitors');
		echo $this->Form->input('recentlyVisited');
		echo $this->Form->input('accessMode');
		echo $this->Form->input('registrationLevel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Matrimony Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
