<?php if(!$currentUser){

	echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>


<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<h4 class="head4">
			<?php echo __('Change Membership'); ?>
		</h4>
		<div class="align-center">
			<?php echo $this->Session->flash(); ?>
		</div>
		<div class="usersChangeMembership">
			<?php if(isset($users) && $users){ ?>
			<div class="userContentBox">
				<table cellpadding="0" cellspacing="0"
					class="table table-bordered table-hover">
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('profilePic', 'Photo'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					
					<th><?php echo $this->Paginator->sort('group_id'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>				
				<td>
					<?php 
					$dir = "uploads/images/".$user['AkpageUser']['id']."/";
					$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);					
					echo $this->Html->image("../".$images[0],array('title'=>'Photo','width'=>'100','height'=>'100'));
					?>
				</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				</td>
						<td class="actions"><?php 
						//echo $this->Html->link($this->Html->image("actionIcons/view-icon.png",array('title'=>__('View'),'width'=>'26','height'=>'26')),array('controller' => 'matrimonyUsers', 'action'=>"view", $user['MatrimonyUser']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
						echo $this->Html->link($this->Html->image("actionIcons/change_access_mode.png",array('title'=>__('Change Membership'),'width'=>'26','height'=>'26')),array('controller' => 'users', 'action'=>"changeMembership", $user['User']['id']),array('escape'=>false))."&nbsp; &nbsp; &nbsp;";
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

				<div class="align-center">
					<?php echo $this->Session->flash(); ?>
				</div>
				<div class="userContentBox">
					<table class="table table-bordered table-hover">
						<tr>
							<td class="capitalize"><?php echo __(h('Membership')); ?>
							</td>
													
							<td class="capitalize"><?php echo $this->Form->input('membership',array('type'=>'radio','label' => false, 'div' => false, 'legend' => '', 'class' => 'custom-radio', 'options'=>array('3'=>'Non-Premium','4'=>'Premium'),'default'=> $groupId)); ?>
							</td>
						</tr>

					</table>

					<?php //echo $this->Form->input('accessMode',array('type'=>'select', 'label' => 'Access Mode'));	?>

					<div class="align-right btm-margin">
						<?php echo $this->Form->submit('Change', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
						<?php 

			if ($currentUser['group_id'] == 2) {
				echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../../users/changeMembership\''
				));
			}/* else {
					echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../matchingProfiles\''
					));
			} */ ?>
						

					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<?php }else {
					echo __("No recors found");
	} ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

