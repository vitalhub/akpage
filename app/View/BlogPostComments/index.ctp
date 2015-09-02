<div class="blogPostComments index">
	<h2><?php echo __('Blog Post Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('blogPostComment'); ?></th>
			<th><?php echo $this->Paginator->sort('blogPost_id'); ?></th>
			<th><?php echo $this->Paginator->sort('commentedBy'); ?></th>
			<th><?php echo $this->Paginator->sort('commentedOn'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedBy'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedOn'); ?></th>
			<th><?php echo $this->Paginator->sort('ACTIVE'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($blogPostComments as $blogPostComment): ?>
	<tr>
		<td><?php echo h($blogPostComment['BlogPostComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($blogPostComment['BlogPostComment']['blogPostComment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($blogPostComment['BlogPost']['title'], array('controller' => 'blog_posts', 'action' => 'view', $blogPostComment['BlogPost']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($blogPostComment['BlogPostCommentCreater']['blogPostComment'], array('controller' => 'blog_post_comments', 'action' => 'view', $blogPostComment['BlogPostCommentCreater']['id'])); ?>
		</td>
		<td><?php echo h($blogPostComment['BlogPostComment']['commentedOn']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($blogPostComment['BlogPostCommentModifier']['blogPostComment'], array('controller' => 'blog_post_comments', 'action' => 'view', $blogPostComment['BlogPostCommentModifier']['id'])); ?>
		</td>
		<td><?php echo h($blogPostComment['BlogPostComment']['modifiedOn']); ?>&nbsp;</td>
		<td><?php echo h($blogPostComment['BlogPostComment']['ACTIVE']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blogPostComment['BlogPostComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $blogPostComment['BlogPostComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $blogPostComment['BlogPostComment']['id']), array(), __('Are you sure you want to delete # %s?', $blogPostComment['BlogPostComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Blog Post Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Comments'), array('controller' => 'blog_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Comment Creater'), array('controller' => 'blog_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
