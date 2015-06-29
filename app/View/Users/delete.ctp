<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="users index">	
		<h4><?php echo __('Admins'); ?></h4>
		
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
						echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"view", $user['User']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
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
		
	<?php }else {
		echo __("No recors found");
	}
	
	} ?>
