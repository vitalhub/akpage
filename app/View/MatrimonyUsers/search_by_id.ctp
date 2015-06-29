


<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="align-center"><?php echo $this->Session->flash(); ?></div>
	<div class="homeNews">
		
		<?php //pr($searchResults); exit;

if (isset($searchedUser)) { 
	
 if( $searchedUser ){ ?>

	<h4 class="head4"><span class="glyphicon glyphicon-user"></span>
			<?php echo __("Profile matching the Matrimony Id: AKPG".$searchedUser['MatrimonyUser']['matrimonyId']); ?>
		</h4>
			<?php 
/* 				echo "<pre>";
				print_r($searchedUser);
				exit; */
				if(isset($searchedUser['AkpageUser']['name'])){
		?>
		<div class="homeNewsBox">

			<div class="homeNewsBoxPic">
				<?php 

				if ($currentUser && $currentUser['group_id'] != 5) {
					$dir="uploads/images/".$searchedUser['AkpageUser']['id']."/";
					$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
					$key = array_search("uploads/images/".$searchedUser['AkpageUser']['id']."/".$searchedUser['MatrimonyUser']['profilePic'],$images);

					echo $this->Html->link($this->Html->image("../".$images[$key],array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$searchedUser['MatrimonyUser']['id']),array('escape'=>false));

				}else {

					if ($searchedUser['AkpageUser']['gender']) {

						echo $this->Html->link($this->Html->image("../uploads/images/bride_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$searchedUser['MatrimonyUser']['id']),array('escape'=>false));
					}else {

						echo $this->Html->link($this->Html->image("../uploads/images/groom_general.png",array('title'=>'Profile Pic','width'=>'100','height'=>'100')),array('action'=>"view/".$searchedUser['MatrimonyUser']['id']),array('escape'=>false));
					}
				}

				?>
			</div>

			<div class="movieUpdates col-xs-12 col-sm-8 col-md-9 col-lg-10">

				<div class="mpContent">
					<span class="mpContentConstants">Name </span> : &nbsp; &nbsp;<span
						class="mpContentVar capitalize"> <?php echo $searchedUser['AkpageUser']['name']; ?>
					</span>
				</div>

				<div class="mpContent">
					<span class="mpContentConstants">Age </span> : &nbsp; &nbsp;<span
						class="mpContentVar"><?php echo $searchedUser['AkpageUser']['age']; ?> </span>
				</div>

				<div class="mpContent align-right">
					<?php echo $this->Html->link('View Details',array('action'=>'view',$searchedUser['MatrimonyUser']['id']), array('class' => 'btn btn-success btn-sm')); ?>
				</div>

			</div>
		</div>

		<?php 
			} ?>


		<?php }else
			echo "<div class='align-center' style='padding-top: 10px;'>".__("No Matches for you")."</div>";
	}else {?>
	
	<div id="searchById">

	<?php 	echo $this->Form->create('MatrimonyUser', array('url' => array('controller' => 'matrimonyUsers', 'action' => 'searchById'), 'type' => 'get')); ?>
	
		<h4 class="head4"><?php echo __('Search By Id'); ?> </h4>
		<div class="userContentBox">
		
			<table class="table table-bordered table-hover">
				<tr>
					<td class="capitalize">
						<?php echo __(h('Enter Matrimony Id')); ?>
					</td>
					
					<td class="capitalize">
						<?php echo $this->Form->input('matrimonyId',array('label'=>false, 'class' => 'form-control')); ?>
					</td>
				</tr>	
				
			</table>
			
			<div class="align-right btm-margin capitalize">
							<?php echo $this->Form->submit('Search', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
							<?php echo $this->Form->button('Cancel', array(
								'type' => 'button',
								'div' => false,
								'class' => array('btn', 'btn-danger', 'btn-sm'),
								'onclick' => 'location.href=\'../matrimonyUsers/searchById\''
									)); ?>
							
				</div>
					
			<?php echo $this->Form->end(); ?>
	
		</div>

</div>

<?php } ?>
	

	</div>

</div>
