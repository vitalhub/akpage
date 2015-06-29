
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"
	style="padding: 0; float: right;">
	<div class="right-col-boxes">
		<!-- <h4 class="head4"><span class="glyphicon glyphicon-search"></span> Search</h4> -->

		<div id="search-tabs">
			<ul id="searchTab" class="nav nav-pills nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#search_basic_id"
					aria-controls="step1" role="tab" data-toggle="pill"><span
						class="glyphicon glyphicon-search"></span> Search</a></li>
				<li role="presentation"><a href="#searchById" aria-controls="step2"
					role="tab" data-toggle="pill"><span
						class="glyphicon glyphicon-search"></span> Search by ID</a></li>
			</ul>

			<div id="searchTabContent" class="tab-content">

				<div role="tabpanel" class="tab-pane fade active in"
					id="search_basic_id">
					<?php echo $this->element('search_basic_id'); ?>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="searchById">
					<?php echo $this->element('searchById'); ?>
				</div>

			</div>
		</div>

	</div>

	<div class="right-col-boxes">
		<h4 class="head4">
			<span class="glyphicon glyphicon-user"></span>
			<?php echo __($recentHeader);?>
		</h4>

		<?php foreach ($recentMembers as $recentMember) { ?>
		<div class="bridesBox">
			<div class="bridesBoxPic">
				<?php 

				/* $dir="uploads/images/".$recentMember['AkpageUser']['id']."/";
				 $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				$key = array_search("uploads/images/".$recentMember['AkpageUser']['id']."/".$recentMember['MatrimonyUser']['profilePic'],$images);
					
				echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$recentMember['MatrimonyUser']['id']),array('escape'=>false)); */
					
				if ($currentUser && $currentUser['group_id'] != 5) {
		    	  			$dir="uploads/images/".$recentMember['AkpageUser']['id']."/";
		    	  			$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		    	  			$key = array_search("uploads/images/".$recentMember['AkpageUser']['id']."/".$recentMember['MatrimonyUser']['profilePic'],$images);
		    	  				
		    	  			echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$recentMember['MatrimonyUser']['id']),array('escape'=>false));
		    	  				
		    	  		}else {

		    	  			if ($recentMember['AkpageUser']['gender']) {

		    	  				echo $this->Html->link($this->Html->image("../uploads/images/bride_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$recentMember['MatrimonyUser']['id']),array('escape'=>false));
		    	  			}else {

		    	  				echo $this->Html->link($this->Html->image("../uploads/images/groom_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$recentMember['MatrimonyUser']['id']),array('escape'=>false));
		    	  			}
		    	  		}


		    	  		?>

			</div>

			<div class="movieUpdates col-xs-10 col-sm-12 col-md-8 col-lg-9">
				<div class="mpContent">
					<span class="mpContentConstants">Name </span> : &nbsp; &nbsp;<span
						class="mpContentVar"> <?php echo $recentMember['AkpageUser']['name']; ?>
					</span>
				</div>
				<div class="mpContent">
					<span class="mpContentConstants">Age </span> : &nbsp; &nbsp;<span
						class="mpContentVar"> <?php echo $recentMember['AkpageUser']['age']; ?>
					</span>
				</div>
				<div class="mpContent align-right">
					<?php echo $this->Html->link('View',array('action'=>'view',$recentMember['MatrimonyUser']['id']), array('class' => 'btn btn-success btn-xs')); ?>
				</div>


			</div>
		</div>



		<?php } ?>

	</div>

</div>
<script>	<!-- this script is for SEARCH tab -->
		$('#searchTab a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
		</script>
