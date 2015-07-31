
	<span class="pull-right">
      	<div class="dropdown">
			  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
			    <span class='glyphicon glyphicon-user'></span> Login
			    <span class="caret"></span>
			  </button>
			  <ul id="dropdown-menu1" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			    <li role="presentation">
				    <?php echo $this->Session->flash('auth'); ?>
					<?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login')); ?>
					<!-- <h5 class="head4"><?php echo __('Please enter your email and password'); ?></h5> -->
			        <div class="users forms" style="padding: 10px;">
						<table class="table myTable">
							<tr>
								<!-- <td class="capitalize">
									<?php //echo __(h('email')); ?>
								</td> -->
									
								<td colspan="2">
									<?php echo $this->Form->input('email',array('type'=>'email', 'div' => false, 'class' => 'form-control')); ?>
								</td>
							</tr>
							<tr>
								<!-- <td class="capitalize">
									<?php //echo __(h('password')); ?>
								</td> -->
								
								<td>
									<?php echo $this->Form->input('password',array('type'=>'password', 'div' => false, 'class' => 'form-control')); ?>
								</td>
							</tr>
							<tr>
								<td style=" padding-right: 15px; text-align: right; " colspan="2"><?php echo $this->html->link('Forgot Password?', array('controller' => 'Users', 'action' => 'forgotPassword')); ?>
								</td>
							</tr>
						</table>
						<div class="align-right"><?php echo $this->Form->end(array('label' => __('Login'), 'class' => array('btn', 'btn-success', 'btn-block'), 'div' => false)); ?></div>
					</div>	
		        </li>
			  </ul>
		</div>
      </span>
       