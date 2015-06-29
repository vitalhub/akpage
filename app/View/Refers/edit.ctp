<div class="refers form">
<?php echo $this->Form->create('Refer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Refer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('referrerEmail');
		echo $this->Form->input('referredEmail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Refer.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Refer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Refers'), array('action' => 'index')); ?></li>
	</ul>
</div>
