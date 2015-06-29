<style>
	.astr{
		background-image: url(<?php echo $this->webroot?>img/zodiac_sign.jpg); 
		width:80px;
		height:80px;
		
	}
	.a1{ background-position: 3px 3px;	}
	.a2{ background-position: -70px 2px;}
	.a3{ background-position: -148px 3px;}
	.a4{ background-position: -223px 3px;}
	.a5{ background-position: 3px -82px;}
	.a6{ background-position: -70px -82px;}
	.a7{ background-position: -148px -82px;}
	.a8{ background-position: -223px -82px;}
	.a9{ background-position: 3px -168px;}
	.a10{ background-position: -70px -168px;}
	.a11{ background-position: -148px -168px;}
	.a12{ background-position: -223px -168px;}
</style>	
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
	<div class="row-fluid">	
		<div id="content" class="span12">
			<div class="row-fluid sortable">
				<div class="box span12 btm-margin">	
				<div class="box-header " data-original-title>
						<h4 class="head4"><i class="icon-user"></i><?php echo $feed[0]['title']; ?></h4>
					</div>
				<div class="box-content">
					<?php echo $feed[0]['desc']; ?>
				</div>
				</div>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12 btm-margin">	
				<div class="box-header" data-original-title>
						<h4 class="head4"><?php echo $feed[13]['title'];?></h4>
					</div>
				<div class="box-content">
					<?php echo $feed[13]['desc']; ?>
				</div>
				</div>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12 btm-margin">
					<div class="box-header" data-original-title>
						<h4 class="head4"><i class="icon-globe"></i> Daily Horoscope</h4>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list list-inline" style="text-align: justify;">
								<?php foreach($feed as $key=>$fd){
									if($key != 0  && $key!=13 ){
								?>
								<li style="min-height:120px; border-bottom:0px;">
									<div class="box span2 col-sm-2 col-md-2 col-lg-2" style="min-height: 85px;">
										<div class="astr a<?php echo $key;?>">
										</div>
									</div>
									<div class="box span10 col-sm-10 col-md-10 col-lg-10" style="min-height: 110px;">
									<div class="box-content">
									<b><?php echo $fd['title'];?> </b><br>
									<?php echo $fd['desc'];?>
									</div>
									</div>
								</li>
								<?php } } ?>
							</ul>
						</div>
					</div>
				</div><!--/span-->

			</div>
		</div>
	</div>
	</div>
	