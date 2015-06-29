<div class="matrimonyUsers view">
	<?php 
		if(!$currentUser){	
			echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	
		}else if($viewedUser['MatrimonyUser']['accessMode'] == 2 && $groupId != 2){ // groupId= 2 for admin ?>
	
			  <?php if($groupId == 4 && $viewedUser['AkpgUser']['user_id'] != $this->Session->read('Auth.User.id')){ // groupId = 4 for premium users.
							
					echo "Details are in private mode. You can see his details based on your request status and once he/she changes access mode from private to any other. </br></br></br>";
							
					if($requestOld){
					
						switch($requestOld['Request']['response']){
						
							case 0:{
							
								echo "<h5>Your previous request still waiting for approval. But still if you want to request again click on the link provided. </br> </h5>";
								echo "<span id='request'>".$this->Js->link('Request Again for Details',
       									array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 1, 'request'),
       			 						array('update' => '#request')
   								)."</span>";
   								
   								break;
							
							}
							
							case 1:{
							
								echo "<h5>Your request to see his/her details already accepted. You can able to see his/her details once they change their access mode from private to any other.</h5>";
								break;
							
							}
							
							case 2:{
							
								echo "<h5>Your previous request was already rejected. But still if you want to request his/her details click the link provided. </br></h5>";
								echo "<span id='request'>".$this->Js->link('Request Again for Details',
       									array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 1, 'request'),
       			 						array('update' => '#request')
   								)."</span>";
   								
  								break;							
							
							}
						
						}
						
  			
					}else{			
 						echo "<span id='request'>".$this->Js->link(' Send Request to see Details',
 							array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 2, 'request'),
      			 				array('update' => '#request')
   						)."</span>";
   					}
   					
   				}else if($groupId == 3 && $viewedUser['AkpgUser']['user_id'] != $this->Session->read('Auth.User.id')){ // groupId = 3 for non-premium users.	?>						   					 
		   	
			  		<marquee><h4>
			  		<?php echo $this->Html->link('Click here to see Complete Details',array('controller'=>'MatrimonyUsers','action' => 'membership')); ?>
			  		</h4></marquee>
		
				<?php }
		
		}else { ?>
		
			<span style="float:right;">
			<dt></dt>
			<dd>
			<?php 
				$dir="uploads/images/".$viewedUser['AkpgUser']['id']."/";
				$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				//pr($images);exit;
				$key = array_search("uploads/images/".$viewedUser['AkpgUser']['id']."/".$viewedUser['MatrimonyUser']['profilePic'],$images);
				echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'300','height'=>'300')),array('action'=>"view",$viewedUser['MatrimonyUser']['id']),array('escape'=>false));
				//echo $this->Html->link($this->Html->image("../".$images[0],array('title'=>'Profile Pic','width'=>'300','height'=>'300')),array('action'=>"view",$viewedUser['MatrimonyUser']['id']),array('escape'=>false));
			 ?>
			&nbsp;
			</dd>
			</span>
		
			<dl>
				<dt><?php echo __('Matrimony Id'); ?></dt>
				<dd>
					<?php echo h("AKPG".$viewedUser['MatrimonyUser']['matrimonyId']); ?>
					&nbsp;
				</dd>
				
				<dt><?php echo __('Profilefor'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['profileFor']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Name'); ?></dt>	
				<dd>
					<?php echo h($viewedUser['AkpgUser']['name']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Surname'); ?></dt>
				<dd>
					<?php echo h($viewedUser['AkpgUser']['surname']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Gothra'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['gothra']); ?>
					&nbsp;
				</dd>
		
				
				<dt><?php echo __('State'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['state']); ?>
					&nbsp;
				</dd>
		
		
				<dt><?php echo __('Qualification'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['qualification']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Height'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['height']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Weight'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['weight']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Smoking'); ?></dt>
				<dd>
					<?php echo ($viewedUser['MatrimonyUser']['smoking'] == 1)? "Yes" : "No"; ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Drinking'); ?></dt>
				<dd>
					<?php echo ($viewedUser['MatrimonyUser']['drinking'] == 1)? "Yes" : "No"; ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('MaritalStatus'); ?></dt>
				<dd>
					<?php 
					$arr = array("Unmarried", "Widower", "Divorced", "Awaiting divorce");
					echo h($arr[$viewedUser['MatrimonyUser']['maritalStatus']]); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('AboutMe'); ?></dt>
				<dd>
					<?php echo h($viewedUser['MatrimonyUser']['aboutMe']); ?>
					&nbsp;
				</dd>
		
				<h3> Family Details </h3>
				<?php $familyDetails = json_decode($viewedUser['MatrimonyUser']['familyDetails'],true); ?>
		
				<dt><?php echo __('Father Name'); ?></dt>
				<dd>
					<?php echo h($familyDetails['fatherName']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Mother Name'); ?></dt>
				<dd>
					<?php echo h($familyDetails['motherName']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Brothers'); ?></dt>
				<dd>
					<?php echo h($familyDetails['brothers']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Sisters'); ?></dt>
				<dd>
					<?php echo h($familyDetails['sisters']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Family Status'); ?></dt>
				<dd>
					<?php echo h($familyDetails['familyStatus']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Family Type'); ?></dt>
				<dd>
					<?php echo h($familyDetails['familyType']); ?>
					&nbsp;
				</dd>
		
	
				<h3> Professional Details </h3>
				<?php $professionalDetails = json_decode($viewedUser['MatrimonyUser']['professionalDetails'],true); ?>
		
				<dt><?php echo __('Employed In'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['employedIn']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Occupation'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['occupation']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Company'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['company']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Designation'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['designation']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Business Name'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['businessName']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Annual Income'); ?></dt>
				<dd>
					<?php echo h($professionalDetails['totalAnnualIncome']); ?>
					&nbsp;
				</dd>
		
		
				<h3> Educational Details </h3>
				<?php $educationalDetails = json_decode($viewedUser['MatrimonyUser']['educationalDetails'],true); ?>
		
				<dt><?php echo __('College Name'); ?></dt>
				<dd>
					<?php echo h($educationalDetails['collegeName']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('University'); ?></dt>
				<dd>
					<?php echo h($educationalDetails['university']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Achievements'); ?></dt>
				<dd>
					<?php echo h($educationalDetails['achievements']); ?>
					&nbsp;
				</dd>
		
		
				<h3> Partner Details </h3>
				<?php $partnerDetails = json_decode($viewedUser['MatrimonyUser']['partnerDetails'],true); ?>
		
				<dt><?php echo __('Qualification'); ?></dt>
				<dd>
					<?php echo h($partnerDetails['qualification']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Height'); ?></dt>
				<dd>
					<?php echo h($partnerDetails['height']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Age Between'); ?></dt>
				<dd>
					<?php echo h($partnerDetails['fromAge']). " and ".h($partnerDetails['toAge']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('City'); ?></dt>
				<dd>
					<?php echo h($partnerDetails['city']); ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Smoking'); ?></dt>
				<dd>
					<?php echo ($partnerDetails['smoking'] == 1)? "Yes": "No"; ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('Drinking'); ?></dt>
				<dd>
					<?php echo ($partnerDetails['drinking'] == 1)? "Yes": "No"; ?>
					&nbsp;
				</dd>
		
				<dt><?php echo __('About Partner'); ?></dt>
				<dd>
					<?php echo h($partnerDetails['aboutPartner']); ?>
					&nbsp;
				</dd>
		
				
				<?php // group = 2 for admin and 4 for premium users
				
				if(in_array($groupId,array(4,2)) || $viewedUser['AkpgUser']['user_id'] == $this->Session->read('Auth.User.id')){
									
					if($viewedUser['MatrimonyUser']['accessMode'] == 1 && $groupId!= 2 && $viewedUser['AkpgUser']['user_id'] != $this->Session->read('Auth.User.id')){ // protected mode limited access.
																		
						$allowed = 2;
						if($requestOld){
					
							switch($requestOld['Request']['response']){
						
								case 0:{
							
									echo "<h5></br>Your previous request still waiting for approval. But still if you want to request again click on the link provided. </br> </h5>";
									echo "<span id='request'>".$this->Js->link('Request Again for Details',
			       								array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 1, 'request'),
			       		 						array('update' => '#request')
			   							)."</span>";
								
									break;
							
								}
							
								case 1:{
					
									$allowed = 1;
									echo "<h5>Your request to see his/her details already accepted. The contact details are provided below.</br></h5>";
									break;
						
								} 
							
								case 2:{
						
									echo "<h5></br>Your previous request was already rejected. But still if you want to request his/her details click the link provided. </br></h5>";
									echo "<span id='request'>".$this->Js->link('Request Again for Details',
			       								array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 1, 'request'),
			       		 						array('update' => '#request')
			   							)."</span>";
			   							
			  						break;							
						
								}
						
							} // end of switch
								  			
						}else{
	   			
 							echo "<span id='request'>".$this->Js->link(' Send Request for Contact Details',
	       								array('action' => 'requestAjaxHandler', $loggedUser['MatrimonyUser']['id'], $viewedUser['MatrimonyUser']['id'], 2, 'request'),
	       								array('update' => '#request')
	   							)."</span>";
	   				
	   					}	

			
					}else {
						 					
						$allowed = 1;
					}
					
				}else{  // non-premium user  
					
					$allowed = 0;
				} 
				
				if($allowed == 1 ){ ?>
				
					<h3> Contact Details </h3>
				
						<dt><?php echo __('City'); ?></dt>
						<dd>
						<?php echo h($viewedUser['MatrimonyUser']['city']); ?>
						&nbsp;
						</dd>
		
						<dt><?php echo __('Address'); ?></dt>
						<dd>
						<?php echo h($viewedUser['MatrimonyUser']['address']); ?>
						&nbsp;
						</dd>
		
						<dt><?php echo __('Date of Birth'); ?></dt>
						<dd>
						<?php echo h($viewedUser['AkpgUser']['dob']); ?>
						&nbsp;
						</dd>
		
						<dt><?php echo __('Email'); ?></dt>
						<dd>
						<?php echo h($viewedUser['Usr']['email']); ?>
						&nbsp;
						</dd>
		
						<dt><?php echo __('Phone'); ?></dt>
						<dd>
						<?php echo h($viewedUser['AkpgUser']['phone']); ?>
						&nbsp;
						</dd>
				
			<?php }else if($allowed == 0){ ?>				
					<marquee><h4>
					<?php echo $this->Html->link('Click here to see Email,Address and Contact Details',array('controller'=>'MatrimonyUsers','action' => 'membership')); ?>
					</h4></marquee>
			<?php } ?>					
		
			</dl>

		<?php } // end of else ?> 
			

</div>	
