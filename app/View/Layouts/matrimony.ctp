<?php echo $this->element('header'); ?>

		<div id="content">
			<div class="container">
				<div class="row">
				
					<?php 
					if ($currentUser['group_id'] != 5) {
						echo $this->element('userLeftNavigation');
					}else {
						echo $this->element('homeLeftNavigation');
					}
					 ?>
					
					<?php echo $this->element('userRightContent'); ?>
					
					<?php echo $this->Session->flash(); ?>
			
					<?php echo $this->fetch('content'); ?>
					
					
					
				</div>
			</div>
		</div> <?php // *********** end of content div ************************* ?>
		
		
<?php echo $this->element('footer'); ?>
		
		
		