<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h4><?php echo __('Delete News'); ?></h4>
		
		<div class="newsDelete">
		
		<?php if(isset($news) && $news){ ?>
		<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-striped">
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('content'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>				
				<th class="actions"><?php echo __('Actions'); ?></th>

			</tr>

			<?php foreach ($news as $news): ?>
			<tr>
				<td><?php echo h($news['News']['id']); ?>&nbsp;</td>
				<td><?php echo h($news['News']['title']); ?>&nbsp;</td>
				<td>				
				<?php 
					if (strlen($news['News']['content']) > 50) $news['News']['content'] = substr($news['News']['content'], 0, 50) . "...";
					echo h($news['News']['content']); 
				?>
				&nbsp;</td>
				<td>
					<?php echo $this->Html->link($news['User']['email'], array('controller' => 'users', 'action' => 'view', $news['User']['id'])); ?>
				</td>
				<td><?php echo h($news['News']['created']); ?>&nbsp;</td>				
				<td class="actions">
					<?php 
						echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"view", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
						echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $news['News']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $news['News']['id']))."&nbsp; &nbsp; &nbsp;";
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
