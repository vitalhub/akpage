
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('qualification')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('partnerQualification',array('type'=>'text','label'=> false, 'required' => false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('height')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('Below 4ft 5in'=>'Below 4ft 5in', '4ft 5in'=>'4ft 5in', '4ft 6in'=>'4ft 6in', '4ft 7in'=>'4ft 7in', '4ft 8in'=>'4ft 8in', '4ft 9in'=>'4ft 9in', '4ft 10in'=>'4ft 10in', '4ft 11in'=>'4ft 11in', '5ft'=>'5ft', '5ft 1in'=>'5ft 1in'
						, '5ft 2in'=>'5ft 2in', '5ft 3in'=>'5ft 3in', '5ft 4in'=>'5ft 4in', '5ft 5in'=>'5ft 5in', '5ft 6in'=>'5ft 6in', '5ft 7in'=>'5ft 7in', '5ft 8in'=>'5ft 8in', '5ft 9in'=>'5ft 9in', '5ft 10in'=>'5ft 10in', '5ft 11in'=>'5ft 11in'
						, '6ft'=>'6ft', '6ft 1in'=>'6ft 1in', '6ft 2in'=>'6ft 2in', '6ft 3in'=>'6ft 3in', '6ft 4in'=>'6ft 4in', '6ft 5in'=>'6ft 5in', '6ft 6in'=>'6ft 6in', '6ft 7in'=>'6ft 7in'
						, '6ft 8in'=>'6ft 8in', '6ft 9in'=>'6ft 9in', '6ft 10in'=>'6ft 10in', '6ft 11in'=>'6ft 11in', '7ft'=>'7ft', 'Above 7ft'=> 'Above 7ft');

				echo $this->Form->input('partnerHeight',array('type' => 'select', 'options' => $options, 'empty' => 'Select Height', 'label'=> false, 'required' => false, 'class' => 'form-control capitalize'));
					
				?></td>

			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Age From')); ?>
				</td>

				<td><?php $options=array('18'=>'18', '19'=>'19', '20'=>'20', '21'=>'21', '22'=>'22', '23'=>'23', '24'=>'24', '25'=>'25', '26'=>'26', '27'=>'27', '28'=>'28', '29'=>'29', '30'=>'30', '31'=>'31', '32'=>'32', '33'=>'33', '34'=>'34', '35'=>'35', '36'=>'36', '37'=>'37', '38'=>'38', '39'=>'39', '40'=>'40');
					
						echo $this->Form->input('fromAge',array('options' => $options, 'empty' => __('Select Minimum'), 'div' => false, 'label'=> false, 'class' => 'form-control capitalize col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px'))); ?>

					<?php echo "<span style='float: left; margin: 5px;'>".__(h('to'))."</span>"; ?>

					<?php 
					$options=array('19'=>'19', '20'=>'20', '21'=>'21', '22'=>'22', '23'=>'23', '24'=>'24', '25'=>'25', '26'=>'26', '27'=>'27', '28'=>'28', '29'=>'29', '30'=>'30', '31'=>'31', '32'=>'32', '33'=>'33', '34'=>'34', '35'=>'35', '36'=>'36', '37'=>'37', '38'=>'38', '39'=>'39', '40'=>'40', '41'=>'41', '42'=>'42', '43'=>'43', '44'=>'44', '45'=>'45', '46'=>'46'
										, '47'=>'47', '48'=>'48', '49'=>'49', '50'=>'50');

									 	  echo $this->Form->input('toAge',array('options' => $options, 'empty' => __('Select Maximum'), 'div' => false, 'label'=> false, 'class' => 'form-control capitalize col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px'))); ?>

				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('state')); ?>
				</td>

				<td class="formTableText"><?php echo $this->Form->input('partnerState_id', array('id'=>'state2', 'type' => 'select', 'empty' => 'Select State', 'label'=> false, 'required' => false, 'class' => 'form-control capitalize'));
				$this->Js->get('#state2')->event(
							    				'change',
							   					 $this->Js->request(
							        			 array('controller' => 'matrimonyUsers', 'action' => 'ajaxStateCities'),
							        			 array('async' => true,
							        			 		'update' => '#city2',
							        			 		'dataExpression' => true,
														'method' => 'post',
														'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
												)
							   				 )
										); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('city')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('partnerCity_id',array('id'=>'city2', 'type' => 'select', 'empty' => 'Select City', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>


			<tr>
				<td class="capitalize"><?php echo __(h('smoking')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('partnerSmoking',array('type'=>'radio','options'=>array('No','Yes'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('drinking')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('partnerDrinking',array('type'=>'radio','options'=>array('No','Yes'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('about Partner')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('aboutPartner',array('type' => 'textarea', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'6')); ?>
		
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
