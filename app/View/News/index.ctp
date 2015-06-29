
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<h4><?php echo __('News'); ?></h4>
				<div class="newsIndex">
					<div class="align-right btm-margin"> 
						<?php if($currentUser){
								echo $this->Html->link($this->Form->button('Add News', array('class' => 'btn btn-md btn-success')), array('action' => 'add'), array('escape'=>false,'title' => "Click to add news."));
						} ?>
					</div>
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
					
					<?php if( ($groupId == 2) || ($news['News']['status'] !=2) ) { ?>
					
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
								<?php echo $this->Html->link($news['User']['email'], array('controller' => 'news', 'action' => 'view', $news['User']['id'])); ?>
							</td>
							<td><?php echo h($news['News']['created']); ?>&nbsp;</td>			
							
							<td class="actions">
								<?php 
									echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"view", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
								 ?>
								
								<?php if( ($currentUser == $news['News']['user_id']) && ($news['News']['status'] == 0) ){ 
									echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"edit", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
									echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $news['News']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $news['News']['id']))."&nbsp; &nbsp; &nbsp;";
								} ?>
								
								<?php if($groupId == 2){
										echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"edit", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
									
										if($news['News']['status'] == 0){
											echo $this->Html->link($this->Html->image("actionIcons/approve-icon.png",array('title'=>__('Approve'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"approve", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
									
											echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $news['News']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $news['News']['id']))."&nbsp; &nbsp; &nbsp;";
																	
										}else if($news['News']['status'] == 1){
											echo $this->Form->postLink($this->Html->image("actionIcons/deleteForever-icon.png",array('title'=>__('Delete'),'width'=>'26','height'=>'26')), array('action' => 'delete', $news['News']['id']), array('escape'=>false), __('Are you sure you want to delete # %s?', $news['News']['id']))."&nbsp; &nbsp; &nbsp;";
											
										}else{
											echo $this->Form->postLink($this->Html->image("actionIcons/reactivate-icon.png",array('title'=>__('Reactivate'),'width'=>'26','height'=>'26')), array('action' => 'reActivate', $news['News']['id']), array('escape'=>false), __('Are you sure you want to Reactivate # %s?', $news['News']['id']))."&nbsp; &nbsp; &nbsp;";
										} 
										
								} ?>
								
							</td>
						</tr>
					
					<?php } ?>
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