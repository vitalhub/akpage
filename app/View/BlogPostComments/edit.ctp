<div class="blogPostComments form">
<?php echo $this->Form->create('BlogPostComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Blog Post Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('blogPostComment');
		echo $this->Form->input('blogPost_id');
		echo $this->Form->input('commentedBy');
		echo $this->Form->input('commentedOn');
		echo $this->Form->input('modifiedBy');
		echo $this->Form->input('modifiedOn');
		echo $this->Form->input('ACTIVE');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPostComment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('BlogPostComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Post Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Comments'), array('controller' => 'blog_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Comment Creater'), array('controller' => 'blog_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
