
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<table>
			
			<tr>
				<td class="content" style="vertical-align:top; width: 95%;">
					
					<?php echo $this->Session->flash(); ?>
										
					<h4 class="head4"><?php echo $news['News']['title']; ?></h4>
						
						<div style=" padding: 10px 10px;">
							<span style="width: 49%; display : inline-block;">					
								<?php echo __('Publisher:'); ?>					
								<?php //echo $this->Html->link($news['Creater']['username'], array('controller' => 'users', 'action' => 'view', $news['Creater']['id'])); 
										echo "Admin";
								?>
							</span>
							
							<span class= "align-right" style="width: 50%; display : inline-block;">						
								<?php echo __('Published On:'); ?>
								<?php echo h($news['News']['created']); ?>
							</span>	
						</div>
							
						<div style="text-align : center; max-width: 100%;">
							<?php 
								echo $this->Html->link($this->Html->image("../uploads/images/news/".$news['News']['picture'],array('title'=>'Profile Pic','max-width'=>'500','max-height'=>'400')),array('controller' => 'news', 'action'=>"view/".$news['News']['id']),array('escape'=>false));
							 ?> 
						</div>
						<div style="text-align: justify; padding : 10px 10px;">						
							<?php echo h($news['News']['content']); ?>
						</div>
						
					</td>
				</tr>
		</table>
	</div>
</div>