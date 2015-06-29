
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('state')); ?>
				</td>

				<td class="formTableText"><?php echo $this->Form->input('state_id', array('id'=>'state', 'type' => 'select', 'empty' => 'Select State', 'label'=> false, 'required' => true,'class' => 'form-control capitalize'));
				$this->Js->get('#state')->event(
						'change',
						$this->Js->request(
								array('controller' => 'matrimonyUsers', 'action' => 'ajaxStateCities'),
								array('async' => true,
							        			 		'update' => '#city',
							        			 		'dataExpression' => true,
														'method' => 'post',
														'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
												)
						)
				); ?></td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('city')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('city_id',array('id'=>'city', 'type' => 'select', 'empty' => 'Select City', 'label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>


			<tr>
				<td class="capitalize"><?php echo __(h('address')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('address',array('label'=> false, 'class' => 'form-control capitalize', 'placeholder' => 'Ex:- 5-5-4/A, 3rd floor, Block-A, Eastern Apparments, Hyderguda.')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Date of Birth')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('AkpageUser.dob',array('type'=>'date','label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 10, 'class' => 'form-control capitalize col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?>
				</td>
			</tr>

			<!-- <tr>
								<td class="capitalize">
									<?php echo __(h('Email')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('User.email',array('type'=>'text','label'=> false, 'class' => 'form-control')); ?>
								</td>
							</tr> -->

			<tr>
				<td class="capitalize"><?php echo __(h('phone')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('AkpageUser.phone',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'5')); ?>
		
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
