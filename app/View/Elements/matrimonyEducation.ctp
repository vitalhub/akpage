
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('qualification')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('qualification',array('type'=>'text','label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('college name')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('collegeName',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('university')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('university',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Achievements')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('achievements',array( 'type' => 'textarea' ,'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>
						
		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'2')); ?>
		
		<div class="align-right btm-margin">
			<?php echo $this->Form->submit('Update', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
			<?php 

			if ($currentUser['group_id'] == 2) {
				echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../../matrimonyUsers/index\''
				));
			}else {
					echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../matchingProfiles\''
					));
			} ?>

		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
