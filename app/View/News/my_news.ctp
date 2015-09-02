
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

	<div class="homeNews" style="margin-top: 10px;">
		  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> My News </h4>
			    	  	  
		  <div class="align-right btm-margin"> 
						
			<?php 
				echo $this->Html->link($this->Form->button(__("What's On Your Mind"), array('class' => 'btn btn-md btn-success')), array('controller' => 'news', 'action' => 'add'), array('escape'=>false,'title' => "Click to add blog post."));
			?>
			</div>
				    	  
				    	 <?php if($myNews){
							foreach($myNews as $myNews){?>
				    	 	  
				    	 	  <div class="homeNewsBox">
				    	  		
				    	  		<div class="homeNewsBoxPic">
				    	  		<?php
				    	  		if ($myNews['News']['picture']) {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/news/".$myNews['News']['picture'],array('title'=>'News Picture','width'=>'100','height'=>'100')),array('controller' => 'news', 'action'=>"view/".$myNews['News']['id']),array('escape'=>false));
				    	  		}else {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'News Picture','width'=>'100','height'=>'100')),array('controller' => 'news', 'action'=>"view/".$myNews['News']['id']),array('escape'=>false));
				    	  		}
									
								?>				    	  	
				    	  		</div>
				    	  		
				    	  		<div class="movieUpdates col-xs-12 col-sm-10 col-md-9 col-lg-10">
						      	<p class="title"><span class="glyphicon glyphicon-chevron-right"></span> 
						      		<?php echo "<span class='capitalizeText'>". $this->Html->link($myNews['News']['title'], array('controller' => 'news', 'action'=>"view/".$myNews['News']['id'])). "</span>"; 
						      		//echo $latestNews['News']['title']; ?>
						      	</p>
						      	<div class="titleContent" style="text-align: justify; padding : 10px 10px; font-size: 12px;"><?php if (strlen($myNews['News']['content']) > 200) $myNews['News']['content'] = substr($myNews['News']['content'], 0, 200) . "...";
									echo $myNews['News']['content'];  ?></div>
						    	</div>
						    	
						    	<div class="align-right btm-margin">
						    		<?php echo $this->Html->link($this->Form->button(__('Edit'), array('class' => 'btn btn-md btn-success')), array('controller' => 'news', 'action' => 'edit', $myNews['News']['id']), array('escape'=>false,'title' => "Click To Edit News.")); ?>
						    		
									<?php echo $this->Form->postLink($this->Form->button(__('Delete'), array('class' => 'btn btn-md btn-success')), array('controller' => 'news', 'action' => 'delete', $myNews['News']['id']), array('escape'=>false,'title' => "Click To Delete News."), __('Are you sure you want to delete # %s?', $myNews['News']['id'])); ?>
								</div>
						    	
				    	  	</div>
				    	  	
				    	  	<?php } ?>
				    	  	
				    	  	<?php if ($this->Paginator->counter('{:pages}')-1) { ?>
				    	  		<div class="align-center">
				    	  		<nav>
				    	  		<ul class="pagination">
				    	  		<?php
				    	  		echo "<li>".$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'))."</li>";
				    	  		echo "<li>".$this->Paginator->numbers(array('separator' => ''), array('class' => 'active'))."</li>";
				    	  		echo "<li>".$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'))."</li>";
				    	  		?>
				    	  		</ul>
				    	  		</nav>
				    	  		</div>
				    	  <?php } ?>
				    	  	
				    	  	
						<?php }else{
								echo "<div class='align-center'>";
								echo __("Sorry...! No News Uploaded By You.");
								echo "</div>";
						}
							?>	
							
				    	  
   	</div>
   	
   </div>
