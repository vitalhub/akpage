
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="align-center">
		<?php echo $this->Session->flash(); ?>
	</div>

	<div id="middleContent">
		<?php if(!$currentUser){

			echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
				}else{ ?>
		<div id="recentVisitors" class="right-col-boxes">
			<h4 class="head4">
				<span class="glyphicon glyphicon-eye-open"></span> Recent Visitors
			</h4>
			<div class="movieUpdates">
				<?php 
				//pr($visitorNames);exit;
				if($recentVisitorsStr){
						for($i=0; $i<count($visitorNames); $i++){
							if ($i == count($visitorNames) - 1) 
								echo "<span class='capitalize'>".$this->Html->link($visitorNames[$i],array('action'=>"view",$visitorIds[$i])). "&nbsp;</span>";
							else 
								echo "<span class='capitalize'>".$this->Html->link($visitorNames[$i],array('action'=>"view",$visitorIds[$i])). ",&nbsp; &nbsp; &nbsp;</span>";
						}
					}
					else
					 echo "No one Visited your profile yet.";
					?>

			</div>
		</div>
	</div>
	
	
	<div class="homeNews">
		<h4 class="head4">
			<span class="glyphicon glyphicon-user"></span>
			<?php echo $msg; ?>
		</h4>

		<?php		
		if($matches){
			foreach($matches as $match){
				if(isset($match['AkpageUser']['name'])){
		?>
		<div class="homeNewsBox">

			<div class="homeNewsBoxPic">
				<?php 

				$dir="uploads/images/".$match['AkpageUser']['id']."/";
				$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				$key = array_search("uploads/images/".$match['AkpageUser']['id']."/".$match['MatrimonyUser']['profilePic'],$images);
				if ($images) {
					echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
				}else {
					echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
				}
				
				?>
			</div>

			<div class="movieUpdates col-xs-12 col-sm-8 col-md-9 col-lg-10">

				<div class="mpContent">
					<span class="mpContentConstants">Name </span> : &nbsp; &nbsp;<span
						class="mpContentVar capitalize"> <?php echo $match['AkpageUser']['name']; ?>
					</span>
				</div>

				<div class="mpContent">
					<span class="mpContentConstants">Age </span> : &nbsp; &nbsp;<span
						class="mpContentVar"><?php echo $match['AkpageUser']['age']; ?> </span>
				</div>

				<div class="mpContent align-right">
					<?php echo $this->Html->link('View Details',array('action'=>'view',$match['MatrimonyUser']['id']), array('class' => 'btn btn-success btn-xs')); ?>
				</div>

			</div>
			<div class="clearfix"></div>
		</div>

		<?php }
			}
		}else
			echo __("No Matches for you");
		?>

		<div class="clearfix"></div>

		<p class="para align-center">
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

	</div>

	<div class="right-col-boxes">
		<h4 class="head4">
			<span class="glyphicon glyphicon-eye-open"></span> Recently Visited
		</h4>
		<div class="movieUpdates">
		
		<?php 
		if($recentVisitedStr){
			for($i=0; $i<count($visitedNames); $i++){
				if ($i == count($visitedNames) - 1) 
					echo "<span class='capitalize'>".$this->Html->link($visitedNames[$i],array('action'=>"view",$visitedIds[$i])). "&nbsp;</span>";
				else
					echo "<span class='capitalize'>".$this->Html->link($visitedNames[$i],array('action'=>"view",$visitedIds[$i])). ",&nbsp; &nbsp; &nbsp;</span>";
			}
		}
		else
		 echo "You haven't visited any other profiles.";
		?>
			
		</div>
	</div>
	
</div>
</div>

<?php	}?>

</div>
