<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ 
		for($i=0;$i<count($pics);$i++){
				
			$images[$i] = $this->Html->image("../uploads/images/".$userId."/".$pics[$i],array('title'=>'Pic'.$i,'width'=>'150','height'=>'150'));
			
		}
	
	?>
	
		<div id="changeProfilePic" style="float:left; width: 75%">
			<?php echo $this->Form->create('MatrimonyUser'); ?>
			<fieldset>
			<legend><?php echo __('select any one of your photos'); ?></legend>
			<?php echo $this->Form->input('photos',array('type'=>'radio','options'=>$images)); ?>
			</fieldset>
			<?php echo $this->Form->end(__('Change Profile Pic')); ?>
		</div>
	
	<?php } ?>
	
	
