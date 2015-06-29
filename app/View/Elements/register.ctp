
      <span class="pull-right" style="margin-right: 10%;">
      		<div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
			    <span class='glyphicon glyphicon-registration-mark'></span> Register
			    <span class="caret"></span>
			  </button>
			  <ul id="dropdown-menu2" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
			    <li role="presentation">
				    <?php 
						echo $this->Session->flash();	
						echo $this->Form->create('User', array('controller' => 'users', 'action' => 'register')); 
					?>
					<!-- <h5 class="head4"><?php echo __('Register'); ?></h5> -->
					<div class="users forms" style="padding: 10px;">
						<table class="table myTable">
							<tr>
								<!-- <td class="capitalize">
									<?php echo __(h('email')); ?>
								</td> -->
									
								<td>
									<?php echo $this->Form->input('email',array('type'=>'email', 'div' => false, 'class' => 'form-control')); ?>
								</td>
							</tr>
							
							<tr>
								<!-- <td class="capitalize">
									<?php echo __(h('password')); ?>
								</td> -->
									
								<td>
									<?php echo $this->Form->input('password',array('type'=>'password', 'div' => false, 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off')); ?>
								</td>
							</tr>
							
							<tr>
								<td colspan="2" style="border: 0;">
									<?php echo $this->Form->input('termsConditions', array('type'=>'checkbox', 'label'=> false, 'div' => false, 'checked'=>false)); ?>
									<?php echo "I accept ". $this->Html->link('Terms & Conditions ', array('controller' => 'users', 'action' => 'termsAndConditions')). "of AK Page."; ?>
								</td>
							</tr>
						</table>
						<div class="align-right"><?php echo $this->Form->end(array('label' => __('Register'), 'class' => array('btn', 'btn-success', 'btn-block'), 'div' => false)); ?></div>
					</div>
		        </li>
			  </ul>
		</div>	
      </span>
 	