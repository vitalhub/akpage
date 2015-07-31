<?php if(!$currentUser){
	
		echo "Session Expired. Please ". $this->Html->Link('Login',array('controller'=> 'users','action'=>'login')) ." again";
	}else{ ?>
	 
<div class="container">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<div class="homeNews">
				<div id="registration-tabs">
					<ul id="myTab" class="nav nav-pills nav-justified" role="tablist">
					  <li role="presentation"><a aria-controls="step1" role="tab"><span class="glyphicon glyphicon-forward"></span> Step 1</a></li>
					  <li role="presentation" class="active"><a aria-controls="step2" role="tab" ><span class="glyphicon glyphicon-forward"></span> Step 2</a></li>
					  <li role="presentation"><a aria-controls="step3" role="tab" ><span class="glyphicon glyphicon-forward"></span> Step 3</a></li>	
					  <li role="presentation"><a aria-controls="step4" role="tab" ><span class="glyphicon glyphicon-forward"></span> Step 4</a></li>
					</ul>
					
					<div id="myTabContent" class="tab-content">
						
						<div role="tabpanel" class="tab-pane fade" id="step1">
							<?php echo $this->element('matrimonyStep1'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade active in" id="step2">
							<?php echo $this->element('matrimonyStep2'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="step3">
							<?php echo $this->element('matrimonyStep3'); ?>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="step4">
							<?php echo $this->element('matrimonyStep4'); ?>
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php } ?>


<script>	<!-- this script is for registration tab -->
$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>


