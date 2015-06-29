	
	
	
	<div class="align-center" style="padding-top: 10px;">			  
		
			<?php 	
				echo $this->Form->create('MatrimonyUser', array('url' => array('controller' => 'matrimonyUsers', 'action' => 'searchBasic'), 'type' => 'get')); ?>
					    <?php echo $this->Form->input('gender',array('legend' => false, 'div' => false, 'label' => 'Gender',
					    						'type'=>'radio', 'options'=>array(
					    						'Groom','Bride')
					    						,'default'=>'1'
					    						, 'style' => ' margin:0px 15px 20px 15px; display: inline-block;'
					    				)); ?>
					    <br>
					    <?php echo $this->Form->input('fromAge',array('label'=>'Age', 'class' => 'form-control', 'style' => 'width:45px; margin:0px 15px; display: inline;', 'value' => '18', 'div' => false)); ?>
					    
					    <?php echo $this->Form->input('toAge',array('label'=>'to', 'class' => 'form-control', 'style' => 'width: 45px; margin: 0px 15px; display: inline;', 'value' => '30', 'div' => false)); ?>
					    <br>
					    <br>
					    <?php echo $this->Form->submit(__('Search', true), array('class' => array('btn', 'btn-info', 'btn-md'), 'div' => false)); ?>
					    
					    <?php //echo $this->Js->submit('Search', array('update' => '#middleContent')); ?>
					    
					    <?php echo $this->Form->end(); ?>
					     
		
		
	<!-- <div class="align-center btm-margin" style="padding: 10px 10px 0px 0px;"><?php echo $this->Html->link('Search by ID', array('controller' => 'matrimonyUsers', 'action' => 'searchById'))?></div> -->
		
	</div>