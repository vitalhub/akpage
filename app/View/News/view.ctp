
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<table>
			
			<tr>
				<td class="content" style="vertical-align:top; width: 95%;">
					
					<?php echo $this->Session->flash(); ?>
										
					<h4 class="head4"><?php echo $news['News']['title']; ?></h4>
						
						<div style=" padding: 10px 10px;" class="smallSizeText">
									<span style="width: 49%; display : inline-block;">					
										<?php echo __('Publisher:'); ?>					
										<?php if (isset($news['User']['AkpageUser']['id'])) {
											echo "<span class='capitalizeText'>".$news['User']['AkpageUser']['name']. " ". $news['User']['AkpageUser']['surname']."</span>";
										}else {
											echo "<span class='capitalizeText'>".__("Admin")."</span>";
										}
																					
										?>
									</span>
									
									<span class= "align-right" style="width: 50%; display : inline-block;">						
										<?php echo __('Published On:'); ?>
										<?php echo h($news['News']['created']); ?>
									</span>
										
								</div>
							
						<div style="text-align : center; max-width: 100%;">
							<?php 
								if ($news['News']['picture']) {
					    	  		echo $this->Html->link($this->Html->image("../uploads/images/news/".$news['News']['picture'],array('title'=>'News Picture', 'width'=>'95%', 'height'=>'95%')),array('controller' => 'news', 'action'=>"view/".$news['News']['id']),array('escape'=>false));
					    	  	}else {
					    	  		// nothing here
					    	  	}
							 ?> 
						</div>
						<div style="text-align: justify; padding : 10px 10px;">						
							<?php echo $news['News']['content']; ?>
						</div>
						
					</td>
				</tr>
		</table>
	</div>
</div>