<?php echo $this->element('header'); ?>

		<div id="content">
			<div class="container">
				<div class="row">
				
					<?php 
					
					if ($currentUser['group_id'] == 1) {
						echo $this->element('superAdminLeftNavigation');
					}elseif ($currentUser['group_id'] == 2) {
						echo $this->element('adminLeftNavigation');
					}
					?>
					
					<?php //echo $this->element('userRightContent'); ?>
					<div style = "width: 120%;">
					<?php echo $this->Session->flash(); ?>
			
					<?php echo $this->fetch('content'); ?>
					
					</div>
					
				</div>
			</div>
		</div> <?php // *********** end of content div ************************* ?>
		
		
<?php echo $this->element('footer'); ?>
		
		
		