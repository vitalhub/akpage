	
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	
	<?php echo $this->Session->flash(); ?>

			<?php echo $this->Form->create('City', array('type' => 'file')); ?>
			<div class="homeNews">
				<h4 class="head4 align-center"><?php echo __('Upload Excel'); ?></h4>
				<div class="userContentBox">
		

			<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
				<tbody>
					<tr>
						<td>
							<?php echo $this->Form->input('excelFile',array('type'=>'file', 'label' => false, 'required' => true)); ?>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="align-right btm-margin">
					<?php echo $this->Form->submit('Upload', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
					<?php echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../../akpageV1.0/Users/home\''
							)); ?>
					
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
