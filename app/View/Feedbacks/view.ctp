<div class="feedback view">
<h2><?php echo __('Feedback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsSufficient'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['isSufficient']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OverAllExperience'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['overAllExperience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HearAkpage'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['hearAkpage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OtherComments'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['otherComments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suggestion'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['suggestion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), array(), __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedback'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?> </li>
	</ul>
</div>
