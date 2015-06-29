
</div> <!-- End of main container-fliud div -->
    <footer id="globalFooter">
    	<div class="container">
    		<div id="footer1">
    		
    			<?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'home')); ?>
    			&nbsp; | &nbsp; 
    		
    			<?php echo $this->Html->link('About Us', array('controller' => 'Users', 'action' => 'aboutUs')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php 
					if ( isset($currentUser['group_id']) && $currentUser['group_id'] == 1 ) {
						echo $this->Html->link("Matrimony", array('controller' => 'users', 'action' => 'index'));
					}else if( isset($currentUser['group_id']) && $currentUser['group_id'] == 2 ) {
						echo $this->Html->link("Matrimony", array('controller' => 'matrimonyUsers', 'action' => 'index'));
					}else{
						echo $this->Html->link("Matrimony", array('controller' => 'matrimonyUsers', 'action' => 'register'));
					}
				?> 
				&nbsp; | &nbsp;
				 
    			<?php echo $this->Html->link('Astrology', array('controller' => 'astrology', 'action' => 'index')); ?>
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('News', array('controller' => 'news', 'action' => 'latestNews')); ?>
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Jobs', array('controller' => 'users', 'action' => 'jobs')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Movies', array('controller' => 'users', 'action' => 'movies')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Wellness', array('controller' => 'users', 'action' => 'wellness')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Family Tree', array('controller' => 'users', 'action' => 'familyTree')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Games', array('controller' => 'users', 'action' => 'games')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Mobile App', array('controller' => 'users', 'action' => 'mobileApp')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Akblog', array('controller' => 'users', 'action' => 'akblog')); ?> 
    			&nbsp; | &nbsp; 
    			
    			<?php echo $this->Html->link('Refer Friend', array('controller' => 'refers', 'action' => 'add')); ?> 
    			&nbsp; | &nbsp; 
    			 
				<?php echo $this->Html->link('Feedback', array('controller' => 'feedbacks', 'action' => 'add')); ?>
				&nbsp; | &nbsp; 
				  
				<?php echo $this->Html->link('Terms & Conditions', array('controller' => 'users', 'action' => 'termsAndConditions')); ?> 
				&nbsp; | &nbsp; 
				
				<?php echo $this->Html->link('Privacy Policy', array('controller' => 'users', 'action' => 'privacyPolicy')); ?> 
				&nbsp; | &nbsp; 
				
				<?php echo $this->Html->link('Disclaimer', array('controller' => 'users', 'action' => 'disclaimer')); ?> 
				&nbsp; | &nbsp;
				
    			<?php echo $this->Html->link('Advertize With Us', array('controller' => 'users', 'action' => 'advertizeWithUs')); ?>
    			
    		</div>
    		<div id="footer2"></div>
    		
    		<span id="copyright">Copyright &copy 2015</span>
				<span style="float: right;">Powered by 
					<?php echo $this->html->link('Vitalsoft', array('http://www.vitalsoftindia.com')); ?>
				</span>
    		
    	</div>
    </footer> <!-- End of footer -->
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php //echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js')); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php //echo $this->Html->script(array('bootstrap.min')); ?>
  
  <?php echo $this->Js->writeBuffer(); ?>
  
  </body>
  
  
  
</html>