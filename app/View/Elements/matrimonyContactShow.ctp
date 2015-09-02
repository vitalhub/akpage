
<div class="homeNews" style="border: 0;">

<div class='align-center'>

	<?php 

	if(in_array($currentUser['group_id'],array(4,2)) || $viewedUser['AkpageUser']['user_id'] == $this->Session->read('Auth.User.id')){
			
		if($viewedUser['MatrimonyUser']['accessMode'] == 1 && $currentUser['group_id']!= 2 && $viewedUser['AkpageUser']['user_id'] != $this->Session->read('Auth.User.id')){ // protected mode limited access.

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

	if($allowed == 1 ){

			?>

	<div class="matrimonyUsers form" style="padding: 10px;">
	<?php 
				if ($viewedUser['MatrimonyUser']) {					
				
					foreach ($viewedUser['MatrimonyUser'] as $key=>$value) {
	
						if ($value == '') {
							$viewedUser['MatrimonyUser'][$key] = $dataEmptyMessage;
						}
					}
			?>
	

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('city')); ?>
				</td>

				<td><?php echo ( ($viewedUser['City']['city'] != '') ? h($viewedUser['City']['city']) : $dataEmptyMessage ); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('address')); ?>
				</td>

				<td><?php echo h($viewedUser['MatrimonyUser']['address']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('state')); ?>
				</td>

				<td><?php echo ( ($viewedUser['State']['state'] != '') ? h($viewedUser['State']['state']) : $dataEmptyMessage ); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Date of Birth')); ?>
				</td>

				<td><?php echo h($viewedUser['AkpageUser']['dob']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Email')); ?>
				</td>

				<td><?php echo h($viewedUser['AkpageUser']['User']['email']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('phone')); ?>
				</td>

				<td><?php echo h($viewedUser['AkpageUser']['phone']); ?>
				</td>
			</tr>

		</table>
		
		<?php }else {
							echo "<p class='userDataEmpty'>";	
							echo __("Sorry...! These Details Are Not Provided By The User.");
							echo "</p>";
					}?>


	</div>


	<?php }else if($allowed == 0){ ?>
	
		<h4 class="align-center">
			<span class="blink"><?php echo $this->Html->link('Click here to see Email, Address and Contact Details',array('controller'=>'MatrimonyUsers','action' => 'payment')); ?></span>
		</h4>
	
	<?php } ?>
	
	</div>

</div>

<style>
@keyframes blink {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.blink {
  animation: blink 700ms infinite;
}</style>


