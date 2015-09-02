<?php 
	/* echo "<pre>";
	print_r($blogPost);
	exit;  */

?>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<table width="100%">
			
			<tr>
				<td class="content" style="vertical-align:top;">
					
					<?php echo $this->Session->flash(); ?>
										
					<h4 class="head4 capitalizeText"><?php echo $blogPost['BlogPost']['title']; ?></h4>
						
						<div style=" padding: 10px 10px;">
							<span class="smallSizeText" style="width: 49%; display : inline-block;">					
								<?php echo __('Posted By:'); ?>					
								<?php 
									echo "<span class='capitalizeText'>".$blogPost['BlogPostCreater']['AkpageUser']['name']. " ". $blogPost['BlogPostCreater']['AkpageUser']['surname']."</span>";										
								?>
							</span>
							
							<span class= "align-right smallSizeText" style="width: 50%; display : inline-block;">						
								<?php echo __('Posted On:'); ?>
								<?php echo h($blogPost['BlogPost']['createdOn']); ?>
							</span>	
						</div>
							
						<div style="text-align : center; max-width: 100%;">
							<?php 
								if ($blogPost['BlogPost']['picture']) {
									echo $this->Html->link($this->Html->image("../uploads/images/blogPosts/".$blogPost['BlogPost']['picture'],array('title'=>'Profile Pic','max-width'=>'500','max-height'=>'400')),array('controller' => 'blogPosts', 'action'=>"view/".$blogPost['BlogPost']['id']),array('escape'=>false));
								}else {
									// nothing here
								}
								
							 ?> 
						</div>
						<div style="text-align: justify; padding : 10px 10px; font-size: 12px;">						
							<?php echo $blogPost['BlogPost']['content']; ?>
						</div>
						
					</td>
				</tr>
				
				
				<tr>
					<td>
						<div class="newsAdd">
			<?php echo $this->Form->create('BlogPostComment', array('controller' => 'blogPostComments', 'action' => 'add/'.$blogPostId)); ?>
			<table class="table table-bordered table-striped table-hover">
				
				<tr>						
					<td class="capitalize">
						<?php echo $this->Form->input('blogPostComment',array('label'=> false, 'div' => false, 'class' => 'form-control capitalize', 'placeholder' => __("Enter Comment Here"), 'rows' => 3 )); ?>
					</td>
				</tr>			
				
			</table>
			
			<div class="align-right btm-margin">
				<?php echo $this->Form->submit(__("Post Comment"), array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
				<?php /* echo $this->Js->submit('Post Comment', array(
    'update' => '#allComments',
    'div' => false,
    'type' => 'json',
    'async' => false
)); */

				?>
				<?php /* if ($currentUser['group_id'] == 2) {
				echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../blogPosts/view/'.$blogPostId.'\''
				));
			}else {
				echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../blogPosts/latestPosts\''
				));
			} */?>
				
			</div>	
			<?php echo $this->Form->end(); ?>
		</div>
		
		</td>
		</tr>
				
		<tr>
			<td>
				<div>
						<h4 class="head4 capitalizeText">All Comments</h4>

	<?php 	/* echo "<pre>";
			print_r($comments);
			exit; */ 
		if ($comments) {
			foreach ($comments as $comment) { 
	?>

	<div class="textPadding" style="clear: both;">

		<div class="textPadding" style="float: left;">
			<?php
			$dir="uploads/images/".$comment['BlogPostCommentCreater']['AkpageUser']['id']."/";
			$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
										
			if($images){
						//echo $this->Html->link($this->Html->image("../".$images[0],array('title'=>'Profile Pic','width'=>'48','height'=>'48')),array('controller' => 'users', 'action'=>"view", $comment['BlogPostComment']['commentedBy']),array('escape'=>false));
						echo $this->Html->image("../".$images[0],array('title'=>'Profile Pic','width'=>'48','height'=>'48'));
					}else {
						//echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Creation Pic','width'=>'48','height'=>'48')),array('controller' => 'users', 'action'=>"view", $comment['BlogPostComment']['commentedBy']),array('escape'=>false));
						echo $this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'Creation Pic','width'=>'48','height'=>'48'));
					}
					?>
		</div>

		<div class="textPadding" style="float: left;">
			
			<span class="smallSizeText capitalizeText">
			<?php 
			if (isset($comment['BlogPostCommentCreater']['AkpageUser']['id'])) {
				echo "<b><i>".$comment["BlogPostCommentCreater"]['AkpageUser']['name']. " ". $comment["BlogPostCommentCreater"]['AkpageUser']['surname'] ."</b></i>";
			}else {
				echo "<b><i>".$comment["BlogPostCommentCreater"]['email']."</b></i>"; }
			?> &nbsp; &nbsp; &nbsp;
			</span>
			
			<span class="smallSizeText"><?php echo $comment['BlogPostComment']['commentedOn']?></span>

			<p class="textPadding capitalizeText">
				<?php echo  $comment['BlogPostComment']['blogPostComment']; ?>
			</p>

			<?php /* if ($comment['Comment']['commentedBy'] != $currentUser['id']) {
					echo $this->Html->link($this->Form->button('Reply'), array('controller' => 'replies', 'action' => 'add', $comment['Comment']['id'] ), array('escape'=>false,'title' => "Click to reply"));
			
			} */ ?>

		</div>

	</div>
	
	<?php } 
		}else{
			echo "<div class='align-center'>";
			echo __("Sorry...! No Comments Postsed.");
			echo "</div>";
		}
	?>
				
	
	</div>			
	
	</td>
		
		</tr>
		
				
		</table>
	</div>
</div>