<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

<div class="matrimonyUsers form">
<?php echo $this->Form->create('MatrimonyUser', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Matrimony Details ----> Step-1'); ?></legend>
	<?php
		$options=array('self'=>'self','son'=>'son','daughter'=>'daughter','brother'=>'brother','sister'=>'sister');
		//echo $this->Form->select('profilefor',$options, array('label' => 'Profile for', 'empty' => 'select'));
		echo $this->Form->input('profileFor', array('options' => $options, 'empty' => '(choose one)'));


		echo $this->Form->input('gothra');
		echo $this->Form->input('state');
		echo $this->Form->input('city');
		//echo $this->Form->textarea('address');
		//echo $this->Form->input('address', array('type' => 'textarea'));
		echo $this->Form->input('address');
		//$options=array('Unmarried' => 'Unmarried', 'Widower' => 'Widower', 'Divorced' => 'Divorced', 'Awaiting divorce' => 'Awaiting divorce');
		$options=array(0=>'Unmarried', 1=>'Widower', 2=>'Divorced', 3=>'Awaiting divorce');		
		echo $this->Form->input('maritalStatus', array('options' => $options, 'empty' => '(choose one)'));
		echo $this->Form->input('smoking',array('type'=>'radio','options'=>array('No','Yes')));
		echo $this->Form->input('drinking',array('type'=>'radio','options'=>array('No','Yes')));
		echo $this->Form->input('height');
		echo $this->Form->input('weight');
		$options=array('public', 'private', 'protected');
		echo $this->Form->input('accessMode', array('options' => $options, 'empty' => '(choose one)'));
		echo $this->Form->input('profilePic',array('type'=>'file'));
		//echo $this->Form->input('aboutMe', array('type' => 'textarea'));
		echo $this->Form->input('aboutMe');
		/*echo $this->Form->input('mothertoungue');
		echo $this->Form->input('caste');
		echo $this->Form->input('country');
		echo $this->Form->hidden('level',array('value'=>'1'));
		echo $this->Form->hidden('group_id',array('value'=>'3'));*/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Next')); ?>
</div>

<?php } ?>

