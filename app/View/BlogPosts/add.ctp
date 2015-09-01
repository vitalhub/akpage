<?php echo $this->Html->script(array('tinymce/tinymce.min')); ?>

<script type="text/javascript">
    tinyMCE.init({
        theme : "modern",
        mode : "textareas",
       // plugins: "image",
        convert_urls : false
    });
</script>

<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>

	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h4 class="head4"><?php echo __('Add Blog Post'); ?></h4>
		
		<div class="newsAdd">
		<?php echo $this->Form->create('BlogPost', array('type'=>'file')); ?>
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td class="capitalize">
						<?php echo __(h('Title')); ?>
					</td>
						
					<td class="capitalize">
						<?php echo $this->Form->input('title',array('label'=> false, 'div' => false, 'class' => 'form-control capitalize')); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('content')); ?>
					</td>
						
					<td class="capitalize">
						<?php echo $this->Form->input('content',array('label'=> false, 'div' => false, 'class' => 'form-control capitalize', 'required' => false)); ?>
					</td>
				</tr>
				<tr>
					<td class="capitalize">
						<?php echo __(h('picture')); ?>
					</td>
						
					<td>
						<?php echo $this->Form->input('picture',array('type'=>'file','label'=> false, 'div' => false)); ?>
					</td>
				</tr>
				
			</table>
			
			<div class="align-right btm-margin">
				<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
				<?php if ($currentUser['group_id'] == 2) {
				echo $this->Form->button('Cancel', array(
						'type' => 'button',
						'div' => false,
						'class' => array('btn', 'btn-danger', 'btn-sm'),
						'onclick' => 'location.href=\'../blogPosts/index\''
				));
			}else {
				echo $this->Form->button('Cancel', array(
					'type' => 'button',
					'div' => false,
					'class' => array('btn', 'btn-danger', 'btn-sm'),
					'onclick' => 'location.href=\'../blogPosts/latestPosts\''
				));
			}?>
				
			</div>	
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

<?php } ?>
