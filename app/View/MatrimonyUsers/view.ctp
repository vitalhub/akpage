
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
	

	
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7"style="float: left;">
		
		<?php echo $this->element('matrimony_user_slider'); ?>
		
		<div class="homeNews" style="margin-top: 20px;">
				<div id="registration-tabs">
					
					<ul id="myTab" class="nav nav-pills nav-justified" role="tablist">
						<li role="presentation" class="active"><a href="#matrimonyGeneral" aria-controls="step1" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-tag"></span> General</a></li>
					    <li role="presentation"><a href="#matrimonyEducation" aria-controls="step2" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-education"></span> Education</a></li>
					    <li role="presentation"><a href="#matrimonyProfession" aria-controls="step3" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-bookmark"></span> Profession</a></li>	
					    <li role="presentation"><a href="#matrimonyFamily" aria-controls="step4" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-link"></span> Family</a></li>
					  
					  	<li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger"> More<span class="caret"></span></a>
	      					<ul class="dropdown-menu" role="menu">
						      <li role="presentation"><a href="#matrimonyContact" aria-controls="matrimonyContact" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
						      <li role="presentation"><a href="#matrimonyPartnerDetails" aria-controls="matrimonyPartnerDetails" role="tab" data-toggle="pill"><span class="glyphicon glyphicon-heart"></span> Partner Details</a></li>
						    </ul>
      			  	   </li>
					</ul>
					
					<div id="myTabContent" class="tab-content">
						
						<div role="tabpanel" class="tab-pane fade active in" id="matrimonyGeneral">
							<?php echo $this->element('matrimonyGeneralShow'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="matrimonyEducation">
							<?php echo $this->element('matrimonyEducationShow'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="matrimonyProfession">
							<?php echo $this->element('matrimonyProfessionShow'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="matrimonyFamily">
							<?php echo $this->element('matrimonyFamilyShow'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="matrimonyContact">
							<?php echo $this->element('matrimonyContactShow'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="matrimonyPartnerDetails">
							<?php echo $this->element('matrimonyPartnerDetailsShow'); ?>
						</div>
						
					</div>
					
				</div>
				
			</div>
		
	





</div>

<?php } ?>	