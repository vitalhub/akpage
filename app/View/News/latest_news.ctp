
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

	<div class="homeNews" style="margin-top: 10px;">
			    	  	  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> Latest News</h4>
				    	  
				    	 <?php if($latestNews){
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
						      	<p class="titleContent"><?php if (strlen($latestNews['News']['content']) > 200) $latestNews['News']['content'] = substr($latestNews['News']['content'], 0, 200) . "...";
									echo h($latestNews['News']['content']);  ?></p>
						    	</div>
				    	  	</div>
				    	  	
				    	  	<?php } ?>
				    	  	
				    	  	<p>
				    	  	<?php
				    	  	echo $this->Paginator->counter(array(
				    	  			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				    	  	));
				    	  	?>
				    	  				</p>
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
				    	  	
						<?php }else
								echo __("Sorry...! No News Posted.");
							?>	
							
				    	  
   	</div>
   	
   </div>