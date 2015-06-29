<?php echo $this->element('header'); ?>
		
		<div id="content">
			<div class="container">
				<div class="row">
					<?php echo $this->element('homeLeftNavigation'); ?>
					
					<?php echo $this->element('homeRightContent'); ?>
		
					<?php echo $this->Session->flash('auth'); ?>
	
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div> <?php // *********** end of content div ************************* ?>
		
<?php echo $this->element('footer'); ?>
		
		
		