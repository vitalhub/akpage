<div class="akpageUsers view">
<h2><?php echo __('Akpage User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($akpageUser['User']['email'], array('controller' => 'users', 'action' => 'view', $akpageUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surname'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['surname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VerificationCode'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['verificationCode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promoter'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['promoter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RefererId'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['refererId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RegistrationLevel'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['registrationLevel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LoggedIn'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['loggedIn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastLogin'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['lastLogin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($akpageUser['AkpageUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Akpage User'), array('action' => 'edit', $akpageUser['AkpageUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Akpage User'), array('action' => 'delete', $akpageUser['AkpageUser']['id']), null, __('Are you sure you want to delete # %s?', $akpageUser['AkpageUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Akpage Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Akpage User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
