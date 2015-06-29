<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}
else{ ?>
	
	<div class="container">
	    <div class="row">
		    
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				
			  <div id="requestHandler" class="homeNews">
	
		<?php	
		switch($request){
		
			case 'pending':{
					
				echo "<h4 class='head4'><span class='glyphicon glyphicon-user'></span> Pending Requests </h4>";
				break;
			}
		
			case 'accepted':{
					
				echo "<h4 class='head4'><span class='glyphicon glyphicon-user'></span> Accepted Requests </h4>";
				break;
			}
				
			case 'declined':{
					
				echo "<h4 class='head4'><span class='glyphicon glyphicon-user'></span> Declined Requests </h4>";
				break;
					
			}
		
		}   // end of switch
		
			
		?>
		
		<?php if($matches){
			foreach($matches as $match){
				//pr($match);exit; ?>			
									
			<div class="homeNewsBox">
    	  		<div class="homeNewsBoxPic">
					<?php 
											
						$dir="uploads/images/".$match['AkpgUser']['id']."/";
						$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
						//pr($images);exit;
						echo $this->Html->link($this->Html->image("../".$images[0],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
					?>
				</div>

				<div class="movieUpdates col-xs-12 col-sm-8 col-md-9 col-lg-10">
					<?php				
						echo "<div class='mpContent'><span class='mpContentConstants'>".'Name : '.$match['AkpgUser']['name']."</span></div>";
						
						echo "<div class='mpContent'><span class='mpContentConstants'>".'Age : '.$match['AkpgUser']['age']."</span></div>";
						
						?>
						
						<div class='mpContent'>
						<?php echo $this->Html->link('View Details',array('action'=>'view',$match['MatrimonyUser']['id']), array('class' => 'btn btn-success btn-xs'));
							
						
						//echo $this->Html->link('view details',array('action'=>'view',$match['MatrimonyUser']['id']));
						
						
						if($type == 1){  // type = 1 for requests coming for you
			
							switch($request){
		
								case 'pending':{			
						
									$msg = "Pending";
									
									echo "<span id='request' class='mpContent'>".$this->Js->link('Accept Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 1, 'accept'),
       							 			array('update' => '#request', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									  									
   									
   									echo "<span id='request2' class='mpContent'>".$this->Js->link('Decline Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 1, 'decline'),
       							 			array('update' => '#request2', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									break;
								}						
			
								case 'accepted':{
			
									$msg = "Accepted";
									
									echo "<span id='request' class='mpContent'>".$this->Js->link('Decline Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 1, 'decline'),
       							 			array('update' => '#request', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									break;
								}
			
								case 'declined':{
			
									$msg = "Declined";
									
									echo "<span id='request' class='mpContent'>".$this->Js->link('Accept Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 1, 'accept'),
       							 			array('update' => '#request', 'class' => 'btn btn-success btn-xs')
   									)."</span>";   									
   									
   									echo "<span id='request2' class='mpContent'>".$this->Js->link('Delete Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 1, 'delete'),
       							 			array('update' => '#request2', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									break;							
										
								}
							}   // end of switch
						
						}else if($type == 2){  // type = 2 for requests sent by you
			
							switch($request){
		
								case 'pending':{			
						
									$msg = "Pending";
									
									echo "<span id='request' class='mpContent'>".$this->Js->link('Request Again',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 2, 'request'),
       							 			array('update' => '#request', 'class' => 'btn btn-success btn-xs')											
   									)."</span>";
   									
   									   									
   									echo "<span id='request2' class='mpContent'>".$this->Js->link('Delete Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 2, 'delete'),
       							 			array('update' => '#request2', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									break;
								}						
			
								case 'accepted':{
			
									$msg = "Accepted";
									// nothing here.
									
									break;
								}
			
								case 'declined':{
			
									$msg = "Declined";
									
									echo "<span id='request' class='mpContent'>".$this->Js->link('Request Again',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 2, 'request'),
       							 			array('update' => '#request', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									   									
   									echo "<span id='request2' class='mpContent'>".$this->Js->link('Delete Request',
       							 			array('action' => 'requestAjaxHandler', $userId, $match['MatrimonyUser']['id'], 2, 'delete'),
       							 			array('update' => '#request2', 'class' => 'btn btn-success btn-xs')
   									)."</span>";
   									
   									break;
							
										
								}
							}   // end of switch
							
							
						
						}
						
						?>
						
					</div>						
																	
			
			</div>
		</div>
		<?php 
		}
	}else
		echo "<div class='align-center'> No Requests for you </div>";
	?>
	
	
				</div>
			</div>
		</div>
	</div>

<?php 
}
 ?>
						