        <div class="nav">
        <div class="nav-header">Are Katika Links</div>
        <ul>
        <li><?php 
		
		if(!empty($this->Session->read('currentUser'))){
			
			if($current_user['User']['group_id'] ==2)
			echo $this->html->link('Matrimony', array('controller' => 'Users', 'action' => 'register1_em')); 
			else
			echo $this->html->link('Matrimony', array('controller' => 'Users', 'action' => 'matrimony')); 
		}else{
			echo $this->html->link('Matrimony', array('controller' => 'MatriUsers', 'action' => 'index')); 
		}
		?>
        </li>
         <li><?php echo $this->html->link('Astrology', array('controller' => 'Users', 'action' => 'home/url:2')); ?>
        </li>
         <li><?php echo $this->html->link('News', array('controller' => 'Users', 'action' => 'home/url:3')); ?>
        </li>
         <li><?php 
		 if(!empty($current_user)){
			if($current_user['User']['group_id'] ==2)
			echo $this->html->link('Jobs', array('controller' => 'Users', 'action' => 'register1_em')); 
			else
			echo $this->html->link('Jobs', array('controller' => 'Users', 'action' => 'jobs'));
			}else
		 echo $this->html->link('Jobs', array('controller' => 'Users', 'action' => 'jobs')); ?>
        </li>
         <li><?php echo $this->html->link('Movies', array('controller' => 'Users', 'action' => 'home/url:5')); ?>
        </li>
         <li><?php echo $this->html->link('Wellness', array('controller' => 'Users', 'action' => 'home/url:6')); ?>
        </li>
         <li><?php echo $this->html->link('Family Tree', array('controller' => 'Users', 'action' => 'home/url:7')); ?>
        </li>
         <li><?php echo $this->html->link('Sudoku', array('controller' => 'Users', 'action' => 'suduko')); ?>
        </li>
		<li><?php echo $this->html->link('Mobile App', array('controller' => 'Users', 'action' => 'home/url:7')) . $this->Html->image('mobile1.png',array('escape'=>false,'alt'=>"Are Katika mobile app"));
		?>
        </li>
		<li><?php echo $this->html->link('Blog', array('controller' => 'BlogPosts', 'action' => 'index'),array('escape'=>false,'class'=>''));
		?>
        </li>
        
        </ul>
        
        </div>
