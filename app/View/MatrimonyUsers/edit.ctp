

<?php if(!$currentUser){

	echo "<div class='col-xs-12 col-sm-7 col-md-7 col-lg-7 align-center'>"."Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again" ."</div>";
	}else{ ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<div class="homeNews">
				<div id="registration-tabs">
					<ul id="myTab" class="nav nav-pills nav-justified" role="tablist">

						<?php if ($editTab == 1) { ?>
						<li role="presentation" class="active"><a href="#matrimonyGeneral"
							aria-controls="step1" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-tag"></span> General</a></li>
						<?php }else {?>
						<li role="presentation"><a href="#matrimonyGeneral"
							aria-controls="step1" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-tag"></span> General</a></li>
						<?php } ?>


						<?php if ($editTab == 2) { ?>
						<li role="presentation" class="active"><a
							href="#matrimonyEducation" aria-controls="step2" role="tab"
							data-toggle="pill"><span class="glyphicon glyphicon-education"></span>
								Education</a></li>
						<?php }else {?>
						<li role="presentation"><a href="#matrimonyEducation"
							aria-controls="step2" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-education"></span> Education</a></li>
						<?php } ?>


						<?php if ($editTab == 3) { ?>
						<li role="presentation" class="active"><a
							href="#matrimonyProfession" aria-controls="step3" role="tab"
							data-toggle="pill"><span class="glyphicon glyphicon-bookmark"></span>
								Profession</a></li>
						<?php }else {?>
						<li role="presentation"><a href="#matrimonyProfession"
							aria-controls="step3" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-bookmark"></span> Profession</a></li>
						<?php } ?>


						<?php if ($editTab == 4) { ?>
						<li role="presentation" class="active"><a href="#matrimonyFamily"
							aria-controls="step4" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-link"></span> Family</a></li>
						<?php }else {?>
						<li role="presentation"><a href="#matrimonyFamily"
							aria-controls="step4" role="tab" data-toggle="pill"><span
								class="glyphicon glyphicon-link"></span> Family</a></li>
						<?php } ?>


						<?php if ( in_array($editTab, array(5,6)) ) { ?>
						<li role="presentation" class="dropdown active"><a
							class="dropdown-toggle" data-toggle="dropdown" href="#"
							role="button" aria-expanded="false"><span
								class="glyphicon glyphicon-menu-hamburger"> More<span
									class="caret"></span>
						
						</a> <?php }else {?>
						
						<li role="presentation" class="dropdown"><a
							class="dropdown-toggle" data-toggle="dropdown" href="#"
							role="button" aria-expanded="false"><span
								class="glyphicon glyphicon-menu-hamburger"> More<span
									class="caret"></span>
						
						</a> <?php } ?>
							<ul class="dropdown-menu" role="menu">
								<li role="presentation"><a href="#matrimonyContact"
									aria-controls="matrimonyContact" role="tab" data-toggle="pill"><span
										class="glyphicon glyphicon-earphone"></span> Contact</a></li>
								<li role="presentation"><a href="#matrimonyPartnerDetails"
									aria-controls="matrimonyPartnerDetails" role="tab"
									data-toggle="pill"><span class="glyphicon glyphicon-heart"></span>
										Partner Details</a></li>
							</ul>
						</li>

					</ul>

					<div id="myTabContent" class="tab-content">

						<?php if ($editTab == 1) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyGeneral">
							<?php echo $this->element('matrimonyGeneral'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade" id="matrimonyGeneral">
							<?php echo $this->element('matrimonyGeneral'); ?>
						</div>
						<?php } ?>

						<?php if ($editTab == 2) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyEducation">
							<?php echo $this->element('matrimonyEducation'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade" id="matrimonyEducation">
							<?php echo $this->element('matrimonyEducation'); ?>
						</div>
						<?php } ?>


						<?php if ($editTab == 3) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyProfession">
							<?php echo $this->element('matrimonyProfession'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade"
							id="matrimonyProfession">
							<?php echo $this->element('matrimonyProfession'); ?>
						</div>
						<?php } ?>


						<?php if ($editTab == 4) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyFamily">
							<?php echo $this->element('matrimonyFamily'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade" id="matrimonyFamily">
							<?php echo $this->element('matrimonyFamily'); ?>
						</div>
						<?php } ?>


						<?php if ($editTab == 5) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyContact">
							<?php echo $this->element('matrimonyContact'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade" id="matrimonyContact">
							<?php echo $this->element('matrimonyContact'); ?>
						</div>
						<?php } ?>


						<?php if ($editTab == 6) { ?>
						<div role="tabpanel" class="tab-pane fade active in"
							id="matrimonyPartnerDetails">
							<?php echo $this->element('matrimonyPartnerDetails'); ?>
						</div>
						<?php }else { ?>
						<div role="tabpanel" class="tab-pane fade"
							id="matrimonyPartnerDetails">
							<?php echo $this->element('matrimonyPartnerDetails'); ?>
						</div>
						<?php } ?>
												

					</div>

				</div>

			</div>

		</div>
	</div>
</div>


<script>	<!-- this script is for registration tab -->
$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>

<?php } ?>