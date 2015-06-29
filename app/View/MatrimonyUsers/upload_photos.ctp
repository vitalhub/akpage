<?php if(!$currentUser){

	echo "<div class='col-xs-12 col-sm-7 col-md-7 col-lg-7 align-center'>"."Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again"."</div>";
	}else{ ?>


<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="homeNews">
		<div id="uploadPhotos">

		<!-- <div id="imgLoading"
				style="display: none; background-color: lightblue; width: 100%; height: 100%; text-align: center;">
				<?php echo $this->Html->image('loading.gif', array('alt' => 'loading')); ?>
			</div> -->

			<?php 
			if($photoCount < $maxPhotos){

				echo $this->Form->create('MatrimonyUser', array('type'=>'file')); ?>

			<h4 class="head4">
				<?php echo __('Upload Photos'); ?>
			</h4>
			<div class="userContentBox">
				<?php
				/* for($i=$photoCount;$i<$maxPhotos;$i++){
					echo $this->Form->input('photos.', array('type' => 'file','multiple', 'required' => false));
					//echo $this->Form->input('profilepic', array('type' => 'radio','options' => array('select as profile pic')));
					//echo $this->Form->hidden('abc',array('value'=>$abc));
				} */

				echo $this->Form->input('photos.', array('type' => 'file','multiple', 'required' => true, 'div' => false, 'class' => 'styledFile', 'label' => false, 'style' => 'margin: 0 auto;'));
					
				?>
				<div class="align-right btm-margin capitalize">
					<?php echo $this->Form->submit('Upload', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>

					<?php /* echo $this->Js->submit(__('Upload'), 
							array(
										'async' => true,
										'update' => '#uploadPhotos',
										'url' => array('action' => 'uploadPhotos'),

										'before' => $this->Js->get('#imgLoading')->effect('fadeIn'),
										'success' => $this->Js->get('#imgLoading')->effect('fadeOut'),
										//'confirm' => 'img/bx_loader.gif',
										//'success' => ''
										'class' => array('btn', 'btn-success', 'btn-sm'),
										'div' => false,
										'dataExpression' => true,
										'method' => 'post',
										'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))

									)
					); */
					?>

					<?php echo $this->Form->button('Cancel', array(
							'type' => 'button',
							'div' => false,
							'class' => array('btn', 'btn-danger', 'btn-sm'),
							'onclick' => 'location.href=\'../matrimonyUsers/uploadPhotos\''
									)); ?>

				</div>

				<?php echo $this->Form->end(); 

					}else{
						echo "You reached maximum photos upload limit. Inorder to upload more photos please ".
								$this->Html->link('delete',array('action'=>'deletePhotos'))." some photos.";
				}?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

