<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>
	
	<div id="uploadPhotos" style="float:left; width: 75%">
	
		<?php 
		/*pr($photoCount);
		pr($maxPhotos);
		exit;*/
		if($photoCount < $maxPhotos){
			echo $this->Form->create('MatrimonyUser', array('type'=>'file')); ?>
			<fieldset>
			<legend><?php echo __('Upload Photos'); ?></legend>
			<?php
			for($i=$photoCount;$i<$maxPhotos;$i++){
				echo $this->Form->input('photos.', array('type' => 'file','multiple', 'required' => false));
				//echo $this->Form->input('profilepic', array('type' => 'radio','options' => array('select as profile pic')));
				//echo $this->Form->hidden('abc',array('value'=>$abc));
			}
		
		?>
			</fieldset>
		
			<?php echo $this->Form->end(__('upload')); 
		}else{
			echo "You reached maximum photos upload limit. Inorder to upload more photos please ".
			$this->Html->link('delete',array('action'=>'deletePhotos'))." some photos.";
		}?>
	
	</div>
	
	<?php } ?>
	
