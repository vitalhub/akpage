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
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Users</h4>
        	
        	<ul>
         
		         <li><?php echo $this->html->link('List Users', array('controller' => 'matrimonyUsers', 'action' => 'index')); ?>
		         </li>
		    <!-- <li><?php echo $this->html->link('Create User', array('controller' => 'Users', 'action' => 'register')); ?>
		         </li>
		         <li><?php echo $this->html->link('Edit Users', array('controller' => 'Users', 'action' => 'edit')); ?>
		         </li>
		         <li><?php echo $this->html->link('Delete Users', array('controller' => 'Users', 'action' => 'delete')); ?>
		         </li>
				 <li><?php echo $this->html->link('Re-Activate Users', array('controller' => 'Users', 'action' => 'reActivate')); ?>
		         </li> -->
		
        </ul>
        
        </div>
        
        <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Matrimony</h4>
        	<ul>
         
		         <li><?php echo $this->html->link('Change User\'s Access Mode', array('controller' => 'MatrimonyUsers', 'action' => 'changeAccessMode')); ?>
		         </li>
		         <li><?php echo $this->html->link('Change User\'s Membership', array('controller' => 'Users', 'action' => 'changeMembership')); ?>
		         </li>
		         
	        </ul>
	        
	        </div>
	        
	    <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> News</h4>
        	<ul>
         
		         <li><?php echo $this->html->link('List News', array('controller' => 'News', 'action' => 'index')); ?>
		         </li>
		         <li><?php echo $this->html->link('Add News', array('controller' => 'News', 'action' => 'add')); ?>
		         </li>
		         <li><?php echo $this->html->link('Edit News', array('controller' => 'News', 'action' => 'edit')); ?>
		         </li>
		         <li><?php echo $this->html->link('Delete News', array('controller' => 'News', 'action' => 'delete')); ?>
		         </li>
				 <li><?php echo $this->html->link('Approve News', array('controller' => 'News', 'action' => 'approve')); ?>
		         </li>
		         <li><?php echo $this->html->link('Re-Activate News', array('controller' => 'News', 'action' => 'reActivate')); ?>
		         </li>
		         		         		         
	        </ul>
	        
	        </div>
	        
	        
	    <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> States</h4>
        	<ul>
         
		         <li><?php echo $this->html->link('States List', array('controller' => 'states', 'action' => 'index')); ?>
		         </li>
		         <li><?php echo $this->html->link('Excel Upload', array('controller' => 'states', 'action' => 'excelUploadStates')); ?>
		         </li>	
		         	
      	 	</ul>
      	 	
      	 	</div>
      	 	
      	 <div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Cities </h4>
        	<ul>
         
		         <li><?php echo $this->html->link('Cities List', array('controller' => 'cities', 'action' => 'index')); ?>
		         </li>
		         <li><?php echo $this->html->link('Excel Upload', array('controller' => 'cities', 'action' => 'excelUploadCities')); ?>
		         </li>	
		         	
      	 	</ul>
      	 	
      	 	</div>
	    
        
        
        </div>
