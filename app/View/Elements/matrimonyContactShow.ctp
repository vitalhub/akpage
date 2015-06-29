
<div class="homeNews" style="border: 0;">

	<?php 

	if(in_array($currentUser['group_id'],array(4,2)) || $viewedUser['AkpgUser']['user_id'] == $this->Session->read('Auth.User.id')){
			
		if($viewedUser['MatrimonyUser']['accessMode'] == 1 && $currentUser['group_id']!= 2 && $viewedUser['AkpgUser']['user_id'] != $this->Session->read('Auth.User.id')){ // protected mode limited access.

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

		<table class="table table-bordered table-striped table-hover">

			<tr>
				<td class="capitalize"><?php echo __(h('city')); ?>
				</td>

				<td><?php echo h($viewedUser['Cits']['city']); ?>
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

				<td><?php echo h($viewedUser['Stats']['state']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Date of Birth')); ?>
				</td>

				<td><?php echo h($viewedUser['AkpgUser']['dob']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('Email')); ?>
				</td>

				<td><?php echo h($viewedUser['Usr']['email']); ?>
				</td>
			</tr>

			<tr>
				<td class="capitalize"><?php echo __(h('phone')); ?>
				</td>

				<td><?php echo h($viewedUser['AkpgUser']['phone']); ?>
				</td>
			</tr>

		</table>


	</div>


	<?php }else if($allowed == 0){ ?>
	
		<h4 class="align-center">
			<span class="blink"><?php echo $this->Html->link('Click here to see Email, Address and Contact Details',array('controller'=>'MatrimonyUsers','action' => 'membership')); ?></span>
		</h4>
	
	<?php } ?>

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


