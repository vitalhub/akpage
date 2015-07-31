
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="states index">
			<h4><?php echo __('States'); ?></h4>
			
			<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('state'); ?></th>
						<th><?php echo $this->Paginator->sort('ACTIVE'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($states as $state): ?>
				<tr>
					<td><?php echo h($state['State']['id']); ?>&nbsp;</td>
					<td><?php echo h($state['State']['state']); ?>&nbsp;</td>
					<td><?php echo h($state['State']['ACTIVE']); ?>&nbsp;</td>
					<td class="actions">
						<?php
							echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"view", $state['State']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";						 
							echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"edit", $state['State']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";  
							echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $state['State']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $state['State']['id']))."&nbsp; &nbsp; &nbsp;";
						 ?>
						
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
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>
				<li><?php echo $this->Html->link(__('New State'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
			</ul>
		</div>
</div>