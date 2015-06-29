<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ 
		for($i=0;$i<count($pics);$i++){
				
			$images[$i] = $this->Html->image("../uploads/images/".$userId."/".$pics[$i],array('title'=>'Pic'.$i,'width'=>'150','height'=>'150'));
			
		}
		//pr($images);exit;
	
	?>
	
		<div id="deletePhotos" style="float:left; width: 75%">
			<?php echo $this->Form->create('MatrimonyUser'); ?>
			<?php /*if(isset($picError) && $picError){
				
				echo "In order to delete your profile pic, first ".
				$this->Html->Link('change your profile pic',array('controller'=> 'MatrimonyUsers',
				'action'=>'changeProfilePic'));
				}*/
			?>
			<fieldset>
			<legend><?php echo __('select the photos which you want to delete.'); ?></legend>
			<?php //echo $this->Form->select('photos', $images, array('multiple' => 'checkbox')); ?>
			<?php //echo $this->Form->checkbox('photo',$images); ?>
			<?php echo $this->Form->input('photos', array(					    
					    'type' => 'select',
					    'label' => false,
					    'multiple' => 'checkbox',
					    'options' => $images,
					    'escape' => false
					    
					  ));?>
			</fieldset>
			<?php echo $this->Form->end(__('Delete Photos')); ?>
			<?php //echo $this->Form->postLink('Delete', array('controller' => 'MatrimonyUsers', 'action' => 'deletePhotos'),
				    		//array('confirm'=>"Are you sure you wish to delete this recipe?"));?>
		</div>
	
	<?php } ?>
	
		
