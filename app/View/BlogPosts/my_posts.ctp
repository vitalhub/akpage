
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

	<div class="homeNews" style="margin-top: 10px;">
		  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> AKBlog </h4>
			    	  	  
		  <div class="align-right btm-margin"> 
						
			<?php 
				echo $this->Html->link($this->Form->button(__('Create Post'), array('class' => 'btn btn-md btn-success')), array('controller' => 'blogPosts', 'action' => 'add'), array('escape'=>false,'title' => "Click to add blog post."));
			?>
			</div>
				    	  
				    	 <?php if($myPosts){
							foreach($myPosts as $myPost){?>
				    	 	  
				    	 	  <div class="homeNewsBox">
				    	  		
				    	  		<div class="homeNewsBoxPic">
				    	  		<?php
				    	  		if ($myPost['BlogPost']['picture']) {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/blogPosts/".$myPost['BlogPost']['picture'],array('title'=>'Blog Post Picture','width'=>'100','height'=>'100')),array('controller' => 'blogPosts', 'action'=>"view/".$myPost['BlogPost']['id']),array('escape'=>false));
				    	  		}else {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Blog Post Picture','width'=>'100','height'=>'100')),array('controller' => 'blogPosts', 'action'=>"view/".$myPost['BlogPost']['id']),array('escape'=>false));
				    	  		}
									
								?>				    	  	
				    	  		</div>
				    	  		
				    	  		<div class="movieUpdates col-xs-12 col-sm-10 col-md-9 col-lg-10">
						      	<p class="title"><span class="glyphicon glyphicon-chevron-right"></span> 
						      		<?php echo "<span class='capitalizeText'>". $this->Html->link($myPost['BlogPost']['title'], array('controller' => 'blogPosts', 'action'=>"view/".$myPost['BlogPost']['id'])). "</span>"; 
						      		//echo $latestNews['News']['title']; ?>
						      	</p>
						      	<div class="titleContent" style="text-align: justify; padding : 10px 10px; font-size: 12px;">
						      	<?php if (strlen($myPost['BlogPost']['content']) > 200) $myPost['BlogPost']['content'] = substr($myPost['BlogPost']['content'], 0, 200) . "...";
									echo $myPost['BlogPost']['content'];  ?></div>
						    	</div>
						    	
						    	<div class="align-right btm-margin">
						    		<?php echo $this->Html->link($this->Form->button(__('Edit'), array('class' => 'btn btn-md btn-success')), array('controller' => 'blogPosts', 'action' => 'edit', $myPost['BlogPost']['id']), array('escape'=>false,'title' => "Click to edit blog post.")); ?>
						    		
									<?php echo $this->Form->postLink($this->Form->button(__('Delete'), array('class' => 'btn btn-md btn-success')), array('controller' => 'blogPosts', 'action' => 'delete', $myPost['BlogPost']['id']), array('escape'=>false,'title' => "Click to delete blog post."), __('Are you sure you want to delete # %s?', $myPost['BlogPost']['id'])); ?>
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
								echo __("Sorry...! No Blog Posts Uploaded By You.");
								echo "</div>";
						}
							?>	
							
				    	  
   	</div>
   	
   </div>
