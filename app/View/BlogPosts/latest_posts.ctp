
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

	<div class="homeNews" style="margin-top: 10px;">
		  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> AKBlog </h4>
			    	  	  
		  <div class="align-right btm-margin"> 
						
			<?php 
				echo $this->Html->link($this->Form->button(__('Create Post'), array('class' => 'btn btn-md btn-success')), array('controller' => 'blogPosts', 'action' => 'add'), array('escape'=>false,'title' => "Click to add blog post."));
			?>
			</div>
				    	  
				    	 <?php 
							if($latestPosts){
							foreach($latestPosts as $latestPost){?>
				    	 	  
				    	 	  <div class="homeNewsBox">
				    	  		
				    	  		<div class="homeNewsBoxPic">
				    	  		<?php
				    	  		if ($latestPost['BlogPost']['picture']) {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/blogPosts/".$latestPost['BlogPost']['picture'],array('title'=>'Blog Post Picture','width'=>'100','height'=>'100')),array('controller' => 'blogPosts', 'action'=>"view/".$latestPost['BlogPost']['id']),array('escape'=>false));
				    	  		}else {
				    	  			echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Blog Post Picture','width'=>'100','height'=>'100')),array('controller' => 'blogPosts', 'action'=>"view/".$latestPost['BlogPost']['id']),array('escape'=>false));
				    	  		}
									
								?>				    	  	
				    	  		</div>
				    	  		
				    	  		<div class="movieUpdates col-xs-12 col-sm-10 col-md-9 col-lg-10">
							      	<p class="title"><span class="glyphicon glyphicon-chevron-right"></span> 
							      		<?php echo "<span class='capitalizeText'>". $this->Html->link($latestPost['BlogPost']['title'], array('controller' => 'blogPosts', 'action'=>"view/".$latestPost['BlogPost']['id'])). "</span>"; 
							      		//echo $latestNews['News']['title']; ?>
							      	</p>
							      	
							    <div style=" padding: 10px 10px;" class="smallSizeText">
									<span style="width: 49%; display : inline-block;">					
										<?php echo __('Posted By:'); ?>					
										<?php 
											//echo "<span class='capitalizeText'>".$latestPost['BlogPostCreater']['AkpageUser']['name']. " ". $latestPost['BlogPostCreater']['AkpageUser']['surname']."</span>";
										if (isset($latestPost['BlogPostCreater']['AkpageUser']['id'])) {
											echo "<span class='capitalizeText'>".$latestPost['BlogPostCreater']['AkpageUser']['name']. " ". $latestPost['BlogPostCreater']['AkpageUser']['surname']."</span>";
										}else {
											echo "<span class='capitalizeText'>".__("Admin")."</span>";
										}
										?>
									</span>
									
									<span class= "align-right" style="width: 50%; display : inline-block;">						
										<?php echo __('Posted On:'); ?>
										<?php echo h($latestPost['BlogPost']['createdOn']); ?>
									</span>
										
								</div>
							      	
							      	<div class="titleContent" style="text-align: justify; padding : 10px 10px; font-size: 12px;"><?php if (strlen($latestPost['BlogPost']['content']) > 200) $latestPost['BlogPost']['content'] = substr($latestPost['BlogPost']['content'], 0, 200) . "...";
										echo $latestPost['BlogPost']['content'];  ?>
									</div>									
									
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
								echo __("Sorry...! No Blog Posts.");
								echo "</div>";
						}
							?>	
							
				    	  
   	</div>
   	
   </div>
