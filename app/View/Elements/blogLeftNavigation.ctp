
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    	
		<div id="homeMenu">			
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-lock'></span>"." Change Password", array('controller' => 'Users', 'action' => 'changePassword'), array('escape' => false)); ?>	
		
		</div>
		
		<div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Blog Posts </h4>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-exclamation-sign'></span>"." Latest Posts", array('controller' => 'blogPosts', 'action' => 'latestPosts'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-exclamation-sign'></span>"." My Posts", array('controller' => 'blogPosts', 'action' => 'myPosts'), array('escape' => false)); ?>		
			
		</div>

		
	</div>
			