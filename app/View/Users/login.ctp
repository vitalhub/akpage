
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<div class="align-center"><?php echo $this->Session->flash('auth'); ?></div>
		<?php echo $this->Form->create('User'); ?>
		
		<h4 class="head4"> <?php echo __('Login'); ?> </h4>
			<div class="align-center"><?php echo $this->Session->flash(); ?></div>
    		<div class="userContentBox">
    		
				<table class="table table-bordered table-hover">
					<tr>
						<td class="capitalize">
							<?php echo __(h('Email')); ?>
						</td>
						
						<td class="capitalize">
							<?php echo $this->Form->input('email',array('label'=>false, 'class' => 'form-control')); ?>
						</td>
					</tr>	
					<tr>
						<td class="capitalize">
							<?php echo __(h('Password')); ?>
						</td>
						<td>
							<?php echo $this->Form->input('password',array('type'=>'password','label'=> false, 'class' => 'form-control')); ?>
						</td>
					</tr>
					<tr>
						<td style=" padding-right: 15px; text-align: right; " colspan="2"><?php echo $this->html->link('Forgot Password?', array('controller' => 'Users', 'action' => 'forgotPassword')); ?>
						</td>
					</tr>
				</table>
			
				<div class="align-right btm-margin">
					<?php echo $this->Form->submit('Login', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
					<?php echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../users/home\''
							)); ?>
					
				</div>
				<?php echo $this->Form->end(); ?>
			</div>	
   	</div>
</div>

