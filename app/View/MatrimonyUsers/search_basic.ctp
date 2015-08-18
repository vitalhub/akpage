
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="align-center">
		<?php echo $this->Session->flash(); ?>
	</div>

	<div id="middleContent"></div>


	<div class="homeNews">
		<h4 class="head4">
			<span class="glyphicon glyphicon-user"></span>
			<?php echo __("Search Results"); ?>
		</h4>

		<?php //pr($searchResults); exit;

if(isset($searchResults) && $searchResults ){
			foreach($searchResults as $match){
				if(isset($match['AkpageUser']['name'])){
		?>
		<div class="homeNewsBox">

			<div class="homeNewsBoxPic">
				<?php 

				if ($currentUser && $currentUser['group_id'] != 5) {
					$dir="uploads/images/".$match['AkpageUser']['id']."/";
					$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
					$key = array_search("uploads/images/".$match['AkpageUser']['id']."/".$match['MatrimonyUser']['profilePic'],$images);

					if ($images) {
						echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
					}else {							
						echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
					}

				}else {

					if ($match['AkpageUser']['gender']) {

						echo $this->Html->link($this->Html->image("../uploads/images/bride_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
					}else {

						echo $this->Html->link($this->Html->image("../uploads/images/groom_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$match['MatrimonyUser']['id']),array('escape'=>false));
					}
				}

				?>
			</div>

			<div class="movieUpdates col-xs-12 col-sm-8 col-md-9 col-lg-10">

				<div class="mpContent">
					<span class="mpContentConstants">Name </span> : &nbsp; &nbsp;<span
						class="mpContentVar"> <?php echo $match['AkpageUser']['name']; ?>
					</span>
				</div>

				<div class="mpContent">
					<span class="mpContentConstants">Age </span> : &nbsp; &nbsp;<span
						class="mpContentVar"><?php echo $match['AkpageUser']['age']; ?> </span>
				</div>

				<div class="mpContent align-right">
					<?php echo $this->Html->link('View Details',array('action'=>'view',$match['MatrimonyUser']['id']), array('class' => 'btn btn-success btn-sm')); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
				
		<?php }
			} ?>
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
			
		<?php }else
			echo __("No Matches for you");
		?>
	
	</div>



</div>

