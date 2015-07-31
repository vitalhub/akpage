<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

	
	<script type="text/javascript">

		function switchVisible() {
	        if (document.getElementById('show1')) {
	
	            if (document.getElementById('show1').style.display == 'none') {
	                document.getElementById('show1').style.display = 'block';
	                document.getElementById('show2').style.display = 'none';
	            }
	            else {
	                document.getElementById('show1').style.display = 'none';
	                document.getElementById('show2').style.display = 'block';
	            }
	        }
		}
	
	</script>
	
	<style>
	
		#show2 {
			display: none;
		}
	
	</style>
	
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<div class="homeNews">
			<div class="changePassword">
				<?php echo $this->Form->create('User'); ?>
					
					<h4 class="head4"> <?php echo __('Change Password'); ?> </h4>
					
					<div class="align-center"><?php echo $this->Session->flash(); ?></div>
								
					<div class="userContentBox" id="show1">
						<div class="align-right btm-margin"><input type="button" class="btn btn-success btn-sm" value="Edit" onclick="switchVisible();"/></div>
						
						<table class="table table-bordered table-hover">
			
							<tr>
								<td class="capitalize">
									<?php echo __(h('Enter New Password')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo __(h('**********')); ?>
								</td>
							</tr>
							
							<tr>
								<td class="capitalize">
									<?php echo __(h('Re-enter New Password')); ?>
								</td>
									
								<td class=" capitalize">
									<?php echo __(h('**********')); ?>
								</td>
							</tr>
							
						</table>
						
					</div>
					 
					<div class="userContentBox" id="show2">
						<table class="table table-bordered table-hover">
							<tr>
								<td class="capitalize">
									<?php echo __(h('Enter New Password')); ?>
								</td>
								
								<td class="capitalize">
									<?php echo $this->Form->input('password',array('type'=>'password','label'=> false, 'class' => 'form-control')); ?>
								</td>
							</tr>	
							<tr>
								<td class="capitalize">
									<?php echo __(h('Re-enter New Password')); ?>
								</td>
									
								<td class="capitalize">
									<?php echo $this->Form->input('password1',array('type'=>'password','label'=> false, 'class' => 'form-control')); ?>
								</td>
							</tr>
						</table>
						<div class="align-right btm-margin">
							<?php echo $this->Form->submit('Change', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../users/changePassword\''
									)); ?>
							
						</div>
						
						<?php echo $this->Form->end(); ?>
						
						
					</div>	
			</div>
		</div>
	</div>
<?php } ?>
