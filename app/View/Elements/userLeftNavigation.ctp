
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    	<div id="userImage">
    		<?php 
    			if (isset($profilePic)) {
    				echo $this->html->link($this->html->image($profilePic, array('alt' => 'Mahesh', 'title' => 'Mahesh')), array('controller' => 'matrimonyUsers', 'action' => 'matchingProfiles') , array('escape' => false));
    			}	 
    		?>
    	</div>
		<div id="homeMenu">
			<?php 
				if ($currentUser) {
					echo $this->Html->link("<span class='glyphicon glyphicon-edit'></span>"." Edit Profile", array('controller' => 'matrimonyUsers', 'action' => 'edit', $currentUser['AkpageUser']['id']), array('escape' => false)); 
				}
			?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-lock'></span>"." Change Password", array('controller' => 'Users', 'action' => 'changePassword'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-cloud-upload'></span>"." Upload Photos", array('controller' => 'matrimonyUsers', 'action' => 'uploadPhotos'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-picture'></span>"." Change Profile Pic", array('controller' => 'matrimonyUsers', 'action' => 'changeProfilePic'), array('escape' => false)); ?>
			<?php 
				if ( $currentUser['group_id'] != 4 ) {
					echo $this->Html->link("<span class='glyphicon glyphicon-piggy-bank'></span>"." Payment", array('controller' => 'matrimonyUsers', 'action' => 'payment'), array('escape' => false));
				}
			?>
			<?php 
				if ($currentUser) {
					echo $this->Html->link("<span class='glyphicon glyphicon-link'></span>"." Change Access Mode", array('controller' => 'matrimonyUsers', 'action' => 'changeAccessMode', $currentUser['id']), array('escape' => false)); 
				}
			?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-remove'></span>"." Delete Photos", array('controller' => 'matrimonyUsers', 'action' => 'deletePhotos'), array('escape' => false)); ?>
			
			<!-- <a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a>
			<a href="changePassword"><span class="glyphicon glyphicon-lock"></span> Change Password</a>
			<a href="uploadPhotos"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Photos</a>
			<a href="changeProfilePic"><span class="glyphicon glyphicon-picture"></span> Change Profile Pic</a>
			<a href="#"><span class="glyphicon glyphicon-piggy-bank"></span> Payment</a>
			<a href="#"><span class="glyphicon glyphicon-link"></span> Change Access Mode</a>
			<a href="deletePhotos"><span class="glyphicon glyphicon-remove"></span> Delete Photos</a> -->
		</div>
		
		<div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-import"></span> Request For You</h4>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-exclamation-sign'></span>"." Pending", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 1, 'pending'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-ok-sign'></span>"." Accepted", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 1, 'accepted'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-remove-sign'></span>"." Declined", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 1, 'declined'), array('escape' => false)); ?>
			
			<!-- <a href="requestForYouPending"><span class="glyphicon glyphicon-exclamation-sign"></span> Pending</a>
			<a href="requestForYouAccepted"><span class="glyphicon glyphicon-ok-sign"></span> Accepted</a>
			<a href="requestForYouDeclined"><span class="glyphicon glyphicon-remove-sign"></span> Declined</a> -->
		</div>

		<div id="homeMenu">
			<h4 class="head4"><span class="glyphicon glyphicon-export"></span> Request By You</h4>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-exclamation-sign'></span>"." Pending", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 2, 'pending'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-ok-sign'></span>"." Accepted", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 2, 'accepted'), array('escape' => false)); ?>
			<?php echo $this->Html->link("<span class='glyphicon glyphicon-remove-sign'></span>"." Declined", array('controller' => 'matrimonyUsers', 'action' => 'requestHandler', 2, 'declined'), array('escape' => false)); ?>
			
			<!-- <a href="requestByYouPending"><span class="glyphicon glyphicon-exclamation-sign"></span> Pending</a>
			<a href="requestByYouAccepted"><span class="glyphicon glyphicon-ok-sign"></span> Accepted</a>
			<a href="requestByYouDeclined"><span class="glyphicon glyphicon-remove-sign"></span> Declined</a> -->
		</div>
	</div>
			