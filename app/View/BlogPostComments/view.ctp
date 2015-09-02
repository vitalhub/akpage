<div class="blogPostComments view">
<h2><?php echo __('Blog Post Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blogPostComment['BlogPostComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BlogPostComment'); ?></dt>
		<dd>
			<?php echo h($blogPostComment['BlogPostComment']['blogPostComment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($blogPostComment['BlogPost']['title'], array('controller' => 'blog_posts', 'action' => 'view', $blogPostComment['BlogPost']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog Post Comment Creater'); ?></dt>
		<dd>
			<?php echo $this->Html->link($blogPostComment['BlogPostCommentCreater']['blogPostComment'], array('controller' => 'blog_post_comments', 'action' => 'view', $blogPostComment['BlogPostCommentCreater']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CommentedOn'); ?></dt>
		<dd>
			<?php echo h($blogPostComment['BlogPostComment']['commentedOn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog Post Comment Modifier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($blogPostComment['BlogPostCommentModifier']['blogPostComment'], array('controller' => 'blog_post_comments', 'action' => 'view', $blogPostComment['BlogPostCommentModifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ModifiedOn'); ?></dt>
		<dd>
			<?php echo h($blogPostComment['BlogPostComment']['modifiedOn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ACTIVE'); ?></dt>
		<dd>
			<?php echo h($blogPostComment['BlogPostComment']['ACTIVE']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blog Post Comment'), array('action' => 'edit', $blogPostComment['BlogPostComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blog Post Comment'), array('action' => 'delete', $blogPostComment['BlogPostComment']['id']), array(), __('Are you sure you want to delete # %s?', $blogPostComment['BlogPostComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Post Comments'), array('controller' => 'blog_post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post Comment Creater'), array('controller' => 'blog_post_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
