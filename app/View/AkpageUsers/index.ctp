<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ 
		/* echo "<pre>";
		print_r($users);
		exit; */
		?>
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="users index">
			<h4><?php echo __('Users'); ?></h4>
			<div class="align-right btm-margin"> 
			<?php //echo $this->Html->link('Add Admin', array('action'=>'register'), array('class' => 'button')); ?>
			<?php  if( $currentUser['group_id'] == 2)
					echo $this->Html->link($this->Form->button('Add User', array('class' => 'btn btn-md btn-success')), array('action' => 'register'), array('escape'=>false,'title' => "Click to add user."));
			?>
			</div>
			<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['AkpageUser']['id']); ?>&nbsp;</td>				
				<td>
					<?php echo $this->Html->link($user['User']['email'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
				</td>
				<td><?php echo h($user['AkpageUser']['name']); ?>&nbsp;</td>
				<td class="actions">
					<?php 
						echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'matrimonyUsers', 'action'=>"view", $user['MatrimonyUser']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";						 
						echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'matrimonyUsers', 'action'=>"edit", $user['AkpageUser']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;"; 
						echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $user['User']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $user['User']['id']))."&nbsp; &nbsp; &nbsp;";
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
		</div>
		</div>
	<?php } ?>
