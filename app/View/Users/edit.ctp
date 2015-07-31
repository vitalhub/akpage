<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="usersEdit">
		<h4><?php echo __('Edit User'); ?></h4>
		<?php if(isset($users) && $users){ ?>
		<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				
				<th><?php echo $this->Paginator->sort('group_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				</td>
				<td class="actions">
					<?php 
						echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"adminsView", $user['User']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";						 
						echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"adminsEdit", $user['User']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;"; 
					 ?>
				</td>
			</tr>
		<?php endforeach; ?>
			</table>
			<p>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>
			</p>
			<div class="align-center">
				<nav>
					<ul class="pagination">
						<?php
						echo "<li>".$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'))."</li>";
						echo "<li>".$this->Paginator->numbers(array('separator' => ''), array('class' => 'active'))."</li>";
						echo "<li>".$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'))."</li>";
						?>
					</ul>
				</nav>
			</div>
			
		<?php }else if($id){ ?>
		
		<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<legend><?php echo __('Edit User'); ?></legend>
			<?php
				
				echo $this->Form->input('email');
				echo $this->Form->input('password', array('required' => false, 'value' => ''));		
				//echo $this->Form->input('group_id');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		
		<?php }else {
		echo __("No recors found");
	} ?>
	
	</div>
	
<?php } ?>
