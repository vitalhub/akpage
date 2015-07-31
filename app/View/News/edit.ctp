<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<h4 class="head4"><?php echo __('Edit News'); ?></h4>
		<div class="newsEdit">
		
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
					 ?>
					<?php 
						echo $this->Html->link($this->Html->image("actionIcons/edit-icon.png",array('title'=>__('Edit'),'width'=>'26','height'=>'26')),array('controller' => 'news', 'action'=>"edit", $news['News']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
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
			
		<?php }else if($id){ ?>
		
		<div class="newsAdd">
		<?php echo $this->Form->create('News', array('type'=>'file')); ?>
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td class="capitalize">
						<?php echo __(h('Title')); ?>
					</td>
						
					<td class="capitalize">
						<?php echo $this->Form->input('title',array('type'=>'text','label'=> false, 'div' => false, 'class' => 'form-control capitalize')); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('content')); ?>
					</td>
						
					<td class="capitalize">
						<?php echo $this->Form->input('content',array('type'=>'textarea','label'=> false, 'div' => false, 'class' => 'form-control capitalize')); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('picture')); ?>
					</td>
						
					<td>
						<?php echo $this->Form->input('picture',array('type'=>'file','label'=> false, 'div' => false)); ?>
					</td>
				</tr>
				
			</table>
			
			<div class="align-right btm-margin">
				<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
				<?php if ($currentUser['group_id'] == 2) {
				echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../../News/index\''
				));
			}?>
				
			</div>	
			<?php echo $this->Form->end(); ?>
		</div>
		
		<?php } ?>
		
		
		
	</div>

<?php } ?>
