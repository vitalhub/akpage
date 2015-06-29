
<div class="homeNews" style="border: 0;">

	<?php echo $this->Form->create('MatrimonyUser'); ?>

	<div class="matrimonyUsers form" style="padding: 10px;">

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('name')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('AkpageUser.name',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('surname')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('AkpageUser.surname',array('type'=>'text', 'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Profile For')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array('self'=>'self','son'=>'son','daughter'=>'daughter','brother'=>'brother','sister'=>'sister');
				echo $this->Form->input('profileFor', array('options' => $options, 'empty' => '(Choose one)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('gothra')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('gothra',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('marital Status')); ?>
				</td>

				<td class="capitalize"><?php 
				$options=array(0=>'Unmarried', 1=>'Widower', 2=>'Divorced', 3=>'Awaiting divorce');
				echo $this->Form->input('maritalStatus', array('options' => $options, 'empty' => '(choose one)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
				?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('smoking')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('smoking',array('type'=>'radio','options'=>array('No','Yes'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('drinking')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('drinking',array('type'=>'radio','options'=>array('No','Yes'), 'div' => false, 'label' => false, 'legend' => false, 'class' => 'capitalize custom-radio' )); ?>
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

										echo $this->Form->input('height',array('type' => 'select', 'options' => $options, 'empty' => 'Select Height', 'label'=> false, 'class' => 'form-control capitalize'));
										?>
				</td>

			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('weight')); ?>
				</td>

				<td><?php 
				$options=array('Below 40 kg' => 'Below 40 kg', '40 kg' => '40 kg','41 kg'=>'41 kg', '42 kg'=>'42 kg', '43 kg'=>'43 kg', '44 kg'=>'44 kg', '45 kg'=>'45 kg', '46 kg'=>'46 kg', '47 kg'=>'47 kg', '48 kg'=>'48 kg', '49 kg'=>'49 kg', '50 kg'=>'50 kg', '51 kg'=>'51 kg', '52 kg'=>'52 kg', '53 kg'=>'53 kg', '54 kg'=>'54 kg', '55 kg'=>'55 kg', '56 kg'=>'56 kg', '57 kg'=>'57 kg'
												, '58 kg'=>'58 kg', '59 kg'=>'59 kg', '60 kg'=>'60 kg', '61 kg'=>'61 kg', '62 kg'=>'62 kg', '63 kg'=>'63 kg', '64 kg'=>'64 kg', '65 kg'=>'65 kg', '66 kg'=>'66 kg', '67 kg'=>'67 kg', '68 kg'=>'68 kg', '69 kg'=>'69 kg', '70 kg'=>'70 kg', '71 kg'=>'71 kg', '72 kg'=>'72 kg', '73 kg'=>'73 kg', '74 kg'=>'74 kg', '75 kg'=>'75 kg', '76 kg'=>'76 kg', '77 kg'=>'77 kg', '78 kg'=>'78 kg' , '79 kg'=>'79 kg', '80 kg'=>'80 kg', '81 kg'=>'81 kg', '82 kg'=>'82 kg', '83 kg'=>'83 kg', '84 kg'=>'84 kg', '85 kg'=>'85 kg', '86 kg'=>'86 kg', '87 kg'=>'87 kg'
												, '88 kg'=>'88 kg', '89 kg'=>'89 kg', '90 kg'=>'90 kg', '91 kg'=>'91 kg', '92 kg'=>'92 kg', '93 kg'=>'93 kg', '94 kg'=>'94 kg', '95 kg'=>'95 kg', '96 kg'=>'96 kg', '97 kg'=>'97 kg', '98 kg'=>'98 kg', '99 kg'=>'99 kg', '100 kg'=>'100 kg', '101 kg'=>'101 kg', '102 kg'=>'102 kg', '103 kg'=>'103 kg', '104 kg'=>'104 kg', '105 kg'=>'105 kg', '106 kg'=>'106 kg', '107 kg'=>'107 kg', '108 kg'=>'108 kg', '109 kg'=>'109 kg', '110 kg'=>'110 kg', '111 kg'=>'111 kg', '111 kg'=>'112 kg', '111 kg'=>'113 kg', '111 kg'=>'114 kg', '115 kg'=>'115 kg', '116 kg'=>'116 kg', '117 kg'=>'117 kg', '118 kg'=>'118 kg', '119 kg'=>'119 kg', '120 kg'=>'120 kg', '121 kg'=>'121 kg', '122 kg'=>'122 kg', '123 kg'=>'123 kg', '124 kg'=>'124 kg', '125 kg'=>'125 kg', '126 kg'=>'126 kg', '127 kg'=>'127 kg', '128 kg'=>'128 kg', '129 kg'=>'129 kg', '130 kg'=>'130 kg', 'Above 130 kg' => 'Above 130 kg');
										echo $this->Form->input('weight', array('options' => $options, 'empty' => '(Kgs)', 'div' => false, 'label' => false, 'class' => 'form-control capitalize'));
									 ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('About Me')); ?>
				</td>

				<td class="capitalize"><?php echo $this->Form->input('aboutMe',array( 'type' => 'textarea' ,'label'=> false, 'class' => 'form-control capitalize')); ?>
				</td>
			</tr>

		</table>
		
		<?php echo $this->Form->hidden('editTab',array('value'=>'1')); ?>
		
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
