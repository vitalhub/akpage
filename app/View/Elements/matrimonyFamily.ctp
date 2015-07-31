
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('Father Name')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('fatherName',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Mother Name')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('motherName',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Brothers')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('0','1','2','3','4','5','6','7','8','9','10','>10');
				echo $this->Form->input('brothers', array('options' => $options, 'empty' => '(how many)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('sisters')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('0','1','2','3','4','5','6','7','8','9','10','>10');
				echo $this->Form->input('sisters', array('options' => $options, 'empty' => '(how many)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Family Status')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('Poor'=>'Poor', 'Middle-Class'=>'Middle-Class',  'Upper-Middle-Class'=>'Upper-Middle-Class','Rich'=>'Rich', 'Affluent'=>'Affluent');
				echo $this->Form->input('familyStatus', array('options' => $options, 'empty' => '(choose one)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Family Type')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('Joint'=>'Joint', 'Nuclear'=>'Nuclear');
				echo $this->Form->input('familyType', array('options' => $options, 'empty' => '(choose one)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'4')); ?>
		
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
