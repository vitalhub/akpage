
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('Employed In')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('Government'=>'Government', 'Private'=>'Private', 'Business'=>'Business', 'Defence'=>'Defence', 'Self Employed'=>'Self Employed');
				echo $this->Form->input('employedIn', array('options' => $options, 'empty' => '(choose one)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('occupation')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('occupation',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('company')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('company',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('designation')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('designation',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('If business, business Name')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('businessName',array('label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Total Annual Income')); ?>
				</td>

				<td class="capitalize"><?php 
					
				$options=array('Below 50,000' => 'Below 50,000', '50,000 - 1 Lakh' => '50,000 - 1 Lakh', '1 Lakh - 2 Lakh' => '1 Lakh - 2 Lakh', '2 Lakh - 3 Lakh' => '2 Lakh - 3 Lakh', '3 Lakh - 4 Lakh' => '3 Lakh - 4 Lakh', '4 Lakh - 5 Lakh' => '4 Lakh - 5 Lakh'
											, '5 Lakh - 6 Lakh' => '5 Lakh - 6 Lakh', '6 Lakh - 7 Lakh' => '6 Lakh - 7 Lakh', '7 Lakh - 8 Lakh' => '7 Lakh - 8 Lakh', '8 Lakh - 9 Lakh' => '8 Lakh - 9 Lakh', '9 Lakh - 10 Lakh' => '9 Lakh - 10 Lakh', '10 Lakh - 15 Lakh' => '10 Lakh - 15 Lakh'
											, '15 Lakh - 20 Lakh' => '15 Lakh - 20 Lakh', '20 Lakh - 25 Lakh' => '20 Lakh - 25 Lakh', '25 Lakh - 30 Lakh' => '25 Lakh - 30 Lakh', '30 Lakh - 35 Lakh' => '30 Lakh - 35 Lakh', '35 Lakh - 40 Lakh' => '35 Lakh - 40 Lakh'
											, '40 Lakh - 45 Lakh' => '40 Lakh - 45 Lakh', '45 Lakh - 50 Lakh' => '45 Lakh - 50 Lakh', 'Above 50 Lakh' => 'Above 50 Lakh');
			
									echo $this->Form->input('totalAnnualIncome',array('type'=>'select', 'options' => $options, 'label'=> false, 'empty' => __('Select Income'), 'required' => true, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'3')); ?>
		
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
