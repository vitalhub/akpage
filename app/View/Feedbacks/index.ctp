<div class="feedback index">
	<h2><?php echo __('Feedback'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('isSufficient'); ?></th>
			<th><?php echo $this->Paginator->sort('overAllExperience'); ?></th>
			<th><?php echo $this->Paginator->sort('hearAkpage'); ?></th>
			<th><?php echo $this->Paginator->sort('otherComments'); ?></th>
			<th><?php echo $this->Paginator->sort('suggestion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($feedback as $feedback): ?>
	<tr>
		<td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['name']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['email']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['isSufficient']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['overAllExperience']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['hearAkpage']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['otherComments']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['suggestion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $feedback['Feedback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feedback['Feedback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feedback['Feedback']['id']), array(), __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?></li>
	</ul>
</div>
