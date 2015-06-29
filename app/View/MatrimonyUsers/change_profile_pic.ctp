	<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ 
		for($i=0;$i<count($pics);$i++){
				
			$images[$i] = $this->Html->image("../uploads/images/".$userId."/".$pics[$i],array('title'=>'Pic'.$i,'width'=>'150','height'=>'150'));
			
		}
	
	?>
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="homeNews">
			<div id="changeProfilePic">
				<?php echo $this->Form->create('MatrimonyUser'); ?>
				<h4 class="head4"><?php echo __('Change Profile Pic'); ?></h4>
				<div class="align-center"><?php echo __('select any one of your photos'); ?></div>
				<div class="align-center"><?php echo $this->Session->flash(); ?></div>
				<div class="userContentBox">
					<?php echo $this->Form->input('photos',array('type'=>'radio','options'=>$images, 'legend' => false, 'div' => false, 'style' => 'margin-right: 20px;')); ?>
					<div class="align-right btm-margin">
							<?php echo $this->Form->submit('Change Profile Pic', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../matrimonyUsers/changeProfilePic\''
									)); ?>
							
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
	
	<?php } ?>
	
	
