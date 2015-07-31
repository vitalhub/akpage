<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
<h4><?php echo __('Admin Details'); ?></h4>
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
			
			
			<tr>
				<td><?php echo __('Id'); ?> </td>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
			</tr>
			
			<tr>
				<td><?php echo __('Email'); ?> </td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
			</tr>
			
			<tr>
				<td><?php echo __('Group'); ?> </td>
				<td>
					<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				</td>
				
			</tr>
		
	</table>
	
</div>
			