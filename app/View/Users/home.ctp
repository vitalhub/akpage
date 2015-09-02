	    <div class="container">
		    <div class="row">
			    <!-- HOME LEFT NAVIGATION -->
			    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			    
			    <?php echo $this->Session->flash(); ?>
			    
			      <div id="slider">			      
						<?php echo $this->Html->script(array('jssor', 'jssor.slider')); ?>
						<?php echo $this->Html->css(array('jssor/jssorStyles')); ?>
						<script>
					        jssor_slider1_starter = function (containerId) {
					            var options = {
					                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
					                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
					                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
					                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
					                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
					
					                $ThumbnailNavigatorOptions: {
					                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
					                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					
					                    $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
					                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
					                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
					                    $DisplayPieces: 6,                              //[Optional] Number of pieces to display, default value is 1
					                    $ParkingPosition: 204,                          //[Optional] The offset position to park thumbnail,
					
					                    $ArrowNavigatorOptions: {
					                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
					                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					                        $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
					                    }
					                }
					            };
					
					            var jssor_slider1 = new $JssorSlider$(containerId, options);
					
					            //responsive code begin
					            //you can remove responsive code if you don't want the slider scales while window resizes
					            function ScaleSlider() {
					                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
					                if (parentWidth)
					                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 720));
					                else
					                    $Jssor$.$Delay(ScaleSlider, 30);
					            }
					
					            ScaleSlider();
					            $Jssor$.$AddEvent(window, "load", ScaleSlider);
					
					
					            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
					                $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
					            }
					
					            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
					            //    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
					            //}
					            //responsive code end
					        };
					    </script>
					    <!-- Jssor Slider Begin -->
					    <!-- You can move inline styles to css file or css block. -->
					    <div id="slider1_container" style="position: relative; width: 720px;
					        height: 480px; overflow: hidden;">
					
					        <!-- Loading Screen -->
					        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
					                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
					            </div>
					            <div style="position: absolute; display: block; background: url(img/homeImages/homeSliderImages/loading.gif) no-repeat center center;
					                top: 0px; left: 0px;width: 100%;height:100%;">
					            </div>
					        </div>
					
					        <!-- Slides Container -->
					        <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 720px; height: 480px;
					            overflow: hidden;">
					            <div class="mySliderImages">
					           		<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/marraige.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/marraige.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/astrology.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/astrology.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/news.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/news.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/jobs.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/jobs.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/movies.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/movies.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/wellness.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/wellness.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/family.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/family.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					           		<?php echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/staticImages/games.png', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php echo $this->Html->image('homeImages/homeSliderImages/staticImages/games.png', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <!-- <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/09.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-09.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/10.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-10.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/11.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-11.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/12.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-12.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/13.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-13.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div>
					            <div class="mySliderImages">
					            	<?php //echo $this->Html->link($this->Html->image('homeImages/homeSliderImages/travel/14.jpg', array('data-u' => 'image')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
					                <?php //echo $this->Html->image('homeImages/homeSliderImages/travel/thumb-14.jpg', array('data-u' => 'thumb'), array('escape' => false)); ?>
					            </div> -->
					        </div>
					        
					        <!-- Thumbnail Navigator Skin Begin -->
					        <div data-u="thumbnavigator" class="jssort07" style="position: absolute; width: 720px; height: 100px; left:0px; bottom: 0px;">
					            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
					            <!-- Thumbnail Item Skin Begin -->
					            <div data-u="slides" style="cursor: move;">
					                <div data-u="prototype" class="p" style="POSITION: absolute; WIDTH: 99px; HEIGHT: 66px; TOP: 0; LEFT: 0;">
					                    <thumbnailtemplate class="i" style="position:absolute;"></thumbnailtemplate>
					                    <!-- <div data-u="thumbnailtemplate" class="i" style="position:absolute;"></div> -->
					                    <div class="o">
					                    </div>
					                </div>
					            </div>
					            <!-- Thumbnail Item Skin End -->
					            <!-- Arrow Navigator Skin Begin -->
					            <!-- Arrow Left -->
									<span data-u="arrowleft" class="jssora11l" style="width: 37px; height: 37px; top: 123px; left: 8px;">
									</span>
									<!-- Arrow Right -->
									<span data-u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px">
									</span>
									<!-- Arrow Navigator Skin End -->
									</div>
									<!-- ThumbnailNavigator Skin End -->
									<!-- Trigger -->
								<script>jssor_slider1_starter('slider1_container');</script>
					    </div>
					    <!-- Jssor Slider End -->
					
					</div>
			      
			        <div class="homeNews" style="margin-top: 10px;">
			    	  	  <h4 class="head4"><span class="glyphicon glyphicon-list-alt"></span> Latest News</h4>
				    	  
				    	 <?php if($latestNews){
							foreach($latestNews as $latestNews){?>
				    	 	  
				    	 	  <div class="homeNewsBox">
				    	  		
				    	  		<div class="homeNewsBoxPic">
				    	  		<?php
				    	  		
				    	  			if ($latestNews['News']['picture']) {
				    	  				echo $this->Html->link($this->Html->image("../uploads/images/news/".$latestNews['News']['picture'],array('title'=>'News Picture','width'=>'100','height'=>'100')),array('controller' => 'news', 'action'=>"view/".$latestNews['News']['id']),array('escape'=>false));
				    	  			}else {
				    	  				echo $this->Html->link($this->Html->image("../uploads/images/not_uploaded.jpg",array('title'=>'News Picture','width'=>'100','height'=>'100')),array('controller' => 'news', 'action'=>"view/".$latestNews['News']['id']),array('escape'=>false));
				    	  			}
									
								?>				    	  	
				    	  		</div>
				    	  		
				    	  		<div class="movieUpdates col-xs-12 col-sm-10 col-md-9 col-lg-10">
						      	<p class="title"><span class="glyphicon glyphicon-chevron-right"></span> 
						      		<?php echo $this->Html->link($latestNews['News']['title'], array('controller' => 'news', 'action'=>"view/".$latestNews['News']['id'])); 
						      		//echo $latestNews['News']['title']; ?>
						      	</p>
						      	<p class="titleContent"><?php if (strlen($latestNews['News']['content']) > 200) $latestNews['News']['content'] = substr($latestNews['News']['content'], 0, 200) . "...";
									echo $latestNews['News']['content'];  ?></p>
						    	</div>
				    	  	</div>
				    	  	
				    	  	<?php }
							}else
								echo __("Sorry...! No News Posted.");
							?>
				    	  
				    	</div>			      
			      
			    </div>
			    <!-- HOME RIGHT CONTENT -->
			</div>	    
	   </div>
    