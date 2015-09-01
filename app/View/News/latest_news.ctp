
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

	<div class="homeNews" style="margin-top: 10px;">
			    	  	  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> Latest News</h4>
				    	  
				    	  <div class="align-right btm-margin"> 
						
			<?php 
				echo $this->Html->link($this->Form->button(__("What's On Your Mind"), array('class' => 'btn btn-md btn-success')), array('controller' => 'news', 'action' => 'add'), array('escape'=>false,'title' => "Click to add blog post."));
			?>
			</div>
				    	  
				    	 <?php 
							if($latestNews){
							foreach($latestNews as $latestNews){?>
				    	 	  
				    	 	  <div class="homeNewsBox">
				    	  		
				    	  		<div class="homeNewsBoxPic">
				    	  		<?php
									echo $this->Html->link($this->Html->image("../uploads/images/news/".$latestNews['News']['picture'],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('controller' => 'news', 'action'=>"view/".$latestNews['News']['id']),array('escape'=>false));
								?>				    	  	
				    	  		</div>
				    	  		
				    	  		<div class="movieUpdates col-xs-12 col-sm-10 col-md-9 col-lg-10">
						      	<p class="title"><span class="glyphicon glyphicon-chevron-right"></span> 
						      		<?php echo $this->Html->link($latestNews['News']['title'], array('controller' => 'news', 'action'=>"view/".$latestNews['News']['id'])); 
						      		//echo $latestNews['News']['title']; ?>
						      	</p>
						      	
						      	<div style=" padding: 10px 10px;" class="smallSizeText">
									<span style="width: 49%; display : inline-block;">					
										<?php echo __('Posted By:'); ?>					
										<?php if (isset($latestNews['User']['AkpageUser']['id'])) {
											echo "<span class='capitalizeText'>".$latestNews['User']['AkpageUser']['name']. " ". $latestNews['User']['AkpageUser']['surname']."</span>";
										}else {
											echo "<span class='capitalizeText'>".__("Admin")."</span>";
										}
																					
										?>
									</span>
									
									<span class= "align-right" style="width: 50%; display : inline-block;">						
										<?php echo __('Posted On:'); ?>
										<?php echo h($latestNews['News']['created']); ?>
									</span>
										
								</div>
						      	
						      	<p class="titleContent"><?php if (strlen($latestNews['News']['content']) > 200) $latestNews['News']['content'] = substr($latestNews['News']['content'], 0, 200) . "...";
									echo $latestNews['News']['content'];  ?></p>
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
								echo __("Sorry...! No News Found.");
								echo "</div>";
						}
							?>	
							
				    	  
   	</div>
   	
   </div>