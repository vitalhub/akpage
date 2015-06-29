

<!-- <div id="searchById">

	<?php 	echo $this->Form->create('MatrimonyUser', array('url' => array('controller' => 'matrimonyUsers', 'action' => 'searchById'), 'type' => 'get')); ?>
	
		<h4 class="head4"><?php echo __('Search By Id'); ?> </h4>
		<div class="userContentBox">
		
			<table class="table table-bordered table-hover">
				<tr>
					<td class="capitalize">
						<?php echo __(h('Enter Matrimony Id')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('matrimonyId',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>	
				
			</table>
			
			<div class="align-right btm-margin capitalize">
							<?php echo $this->Form->submit('Search', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../matrimonyUsers/searchById\''
									)); ?>
							
				</div>
					
			<?php echo $this->Form->end(); ?>
	
		</div>

	</div>
 -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div id="searchById">

		<?php 	echo $this->Form->create('MatrimonyUser', array('url' => array('controller' => 'matrimonyUsers', 'action' => 'searchById'), 'type' => 'get')); ?>
	
		<!-- <h4 class="head4"><?php echo __('Search By Id'); ?> </h4> -->
		<div  class="capitalize" style="width: 88%;margin: 0 auto;">
			
			<?php echo __(h('Enter Matrimony Id')); ?>
			<br>
			<br>
			
				<?php echo $this->Form->input('matrimonyId',array('label'=>false, 'class' => 'form-control')); ?>
			
			<br>
			<div class="align-right btm-margin capitalize">
							<?php echo $this->Form->submit('Search', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php /* echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../matrimonyUsers/searchById\''
									)); */ ?>
							
			</div>
					
		<?php echo $this->Form->end(); ?>
	
		</div> 
	</div>