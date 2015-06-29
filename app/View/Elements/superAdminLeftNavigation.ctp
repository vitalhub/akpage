    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        
        <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Profile</h4>
	        <ul>
	        <!-- <li><?php echo $this->html->link('Change Email', array('controller' => 'Users', 'action' => 'changeEmail')); ?>
		        </li> -->
		         <li><?php echo $this->html->link('Change Password', array('controller' => 'Users', 'action' => 'changePassword')); ?>
		        </li>
	        </ul>
	        
	       </div>
        
        <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Admins </h4>
        	<ul>
         
		         <li><?php echo $this->html->link('List Admins', array('controller' => 'Users', 'action' => 'index')); ?>
		         </li>
		         <li><?php echo $this->html->link('Create Admins', array('controller' => 'Users', 'action' => 'register')); ?>
		         </li>
		    <!-- <li><?php echo $this->html->link('Edit Admins', array('controller' => 'Users', 'action' => 'edit')); ?>
		         </li> -->
		         <li><?php echo $this->html->link('Delete Admins', array('controller' => 'Users', 'action' => 'delete')); ?>
		         </li>
				 <li><?php echo $this->html->link('Re-Activate Admins', array('controller' => 'Users', 'action' => 'reActivate')); ?>
		         </li>
		
        </ul>
        
        </div>
        
        </div>
