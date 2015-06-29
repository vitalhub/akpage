
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="align-center">
		<?php echo $this->Session->flash(); ?>
	</div>

	<div class="homeNews">

		<div class="users form">
			<?php 

	echo $this->Form->create('User'); ?>
			<h4 class="head4">
				<?php echo __('Register'); ?>
			</h4>

			<div class="userContentBox">
				<table class="table table-bordered table-hover">
					<tr>
						<td class="capitalize"><?php echo __(h('Email')); ?>
						</td>

						<td class="capitalize"><?php echo $this->Form->input('email',array('label'=>false, 'class' => 'form-control')); ?>
						</td>
					</tr>
					<tr>
						<td class="capitalize"><?php echo __(h('Password')); ?>
						</td>
						<td><?php echo $this->Form->input('password',array('type'=>'password','label'=> false, 'class' => 'form-control', 'value' => '', 'autocomplete' => 'off')); ?>
						</td>
					</tr>

					<?php if (!in_array($groupId, array(1,2))) { ?>
					<tr>
						<td colspan="2" style="border: 0; text-align: center;"><?php echo $this->Form->input('termsConditions', array('type'=>'checkbox', 'label'=> false, 'div' => false, 'checked'=>false)); ?>
							<?php echo "I accept ". $this->Html->link('Terms & Conditions ', array('controller' => 'users', 'action' => 'termsAndConditions')). "of AK Page."; ?>
						</td>
					</tr>
					<?php } ?>


				</table>

				<div class="align-right btm-margin">
					<?php echo $this->Form->submit('Register', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
					<?php 
					if ($groupId == 2) {
						echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../matrimonyUsers/index\''
					));
					}else {
						echo $this->Form->button('Cancel', array(
							'type' => 'button',
							'div' => false,
							'class' => array('btn', 'btn-danger', 'btn-sm'),
							'onclick' => 'location.href=\'../users/home\''
					)); }
				?>



				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>


<script>
/* $('#a-reload').click(function() {
	var $captcha = $("#img-captcha");
    $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
	return false; 
}); */
</script>
