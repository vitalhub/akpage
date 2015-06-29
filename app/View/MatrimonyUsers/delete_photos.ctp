<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ 
		for($i=0;$i<count($pics);$i++){
				
			$images[$i] = $this->Html->image("../uploads/images/".$userId."/".$pics[$i],array('title'=>'Pic'.$i,'width'=>'150','height'=>'150'));
			
		}
		//pr($images);exit;
	
	?>
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="homeNews">
			<div id="deletePhotos">
				<?php echo $this->Form->create('MatrimonyUser'); ?>
				<?php /*if(isset($picError) && $picError){
					
					echo "In order to delete your profile pic, first ".
					$this->Html->Link('change your profile pic',array('controller'=> 'MatrimonyUsers',
					'action'=>'changeProfilePic'));
					}*/
				?>
				<h4 class="head4"><?php echo __('Delete Photos'); ?></h4>
				<div class="align-center"><?php echo __('select the photos which you want to delete.'); ?></div>
				<div class="align-center"><?php echo $this->Session->flash(); ?></div>
				<?php //echo $this->Form->select('photos', $images, array('multiple' => 'checkbox')); ?>
				<?php //echo $this->Form->checkbox('photo',$images); ?>
				<div class="userContentBox">
					<?php echo $this->Form->input('photos', array(					    
							    'type' => 'select',
							    'label' => false,
							    'multiple' => 'checkbox',
								'div'	=> false,
								'label'	=> false,
								/* 'style' => 'float: left;', */
							    'options' => $images,
							    'escape' => false,
								'class' => 'photoCheckBox'
							    
							  ));?>
				<div class="align-right btm-margin">
							<?php echo $this->Form->submit('Delete Photos', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../matrimonyUsers/deletePhotos\''
									)); ?>
							
				</div>
					<?php echo $this->Form->end(); ?>
				
				</div>
				<?php //echo $this->Form->postLink('Delete', array('controller' => 'MatrimonyUsers', 'action' => 'deletePhotos'),
					    		//array('confirm'=>"Are you sure you wish to delete this recipe?"));?>
			</div>
		</div>
	</div>
	<?php } ?>
	
		
