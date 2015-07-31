<div class="refers view">
<h2><?php echo __('Refer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($refer['Refer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ReferrerEmail'); ?></dt>
		<dd>
			<?php echo h($refer['Refer']['referrerEmail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ReferredEmail'); ?></dt>
		<dd>
			<?php echo h($refer['Refer']['referredEmail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Refer'), array('action' => 'edit', $refer['Refer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Refer'), array('action' => 'delete', $refer['Refer']['id']), array(), __('Are you sure you want to delete # %s?', $refer['Refer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Refers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Refer'), array('action' => 'add')); ?> </li>
	</ul>
</div>
