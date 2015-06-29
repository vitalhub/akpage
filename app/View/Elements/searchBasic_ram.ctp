<div id="searchBasic" style="float:left; width: 75%">
	
		<?php 	
				echo $this->Form->create('MatrimonyUser', array('controller' => 'matrimonyUsers', 'action' => 'searchBasic')); ?>
				<fieldset>
				<legend><?php echo __('Basic Search'); ?></legend>
				<?php echo $this->Form->input('gender',array('type'=>'radio','options'=>array('Groom','Bride'),'default'=>'1')); ?>
				<?php echo $this->Form->input('fromAge',array('label'=>'Age between')); ?>
				<?php echo $this->Form->input('toAge',array('label'=>'and')); ?>			
			
				</fieldset>
		
				<?php echo $this->Form->end(__('Search')); ?>
	
</div>
	
	
	
