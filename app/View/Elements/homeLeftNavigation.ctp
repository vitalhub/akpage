

<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	<div id="homeMenu">
		<?php 
		if ( isset($currentUser['group_id']) && $currentUser['group_id'] == 1 ) {
			echo $this->Html->link("<span class='glyphicon glyphicon-heart'></span>"." Matrimony", array('controller' => 'users', 'action' => 'index'), array('escape' => false));
		}else if( isset($currentUser['group_id']) && $currentUser['group_id'] == 2 ) {
			echo $this->Html->link("<span class='glyphicon glyphicon-heart'></span>"." Matrimony", array('controller' => 'matrimonyUsers', 'action' => 'index'), array('escape' => false));
		}else{
			echo $this->Html->link("<span class='glyphicon glyphicon-heart'></span>"." Matrimony", array('controller' => 'matrimonyUsers', 'action' => 'register'), array('escape' => false));
		}
		?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-star-empty'></span>"." Astrology", array('controller' => 'astrology', 'action' => 'index'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-list-alt'></span>"." News", array('controller' => 'news', 'action' => 'latestNews'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-briefcase'></span>"." Jobs", array('controller' => 'users', 'action' => 'jobs'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-facetime-video'></span>"." Movies", array('controller' => 'users', 'action' => 'movies'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-cutlery'></span>"." Wellness", array('controller' => 'users', 'action' => 'wellness'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-grain'></span>"." Family Tree", array('controller' => 'users', 'action' => 'familyTree'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-knight'></span>"." Games", array('controller' => 'users', 'action' => 'games'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-phone'></span>"." Mobile App", array('controller' => 'users', 'action' => 'mobileApp'), array('escape' => false)); ?>
		<?php echo $this->Html->link("<span class='glyphicon glyphicon-pencil'></span>"." Akblog", array('controller' => 'users', 'action' => 'akblog'), array('escape' => false)); ?>

		<!-- <a href="#"><span class="glyphicon glyphicon-heart"></span> Matrimony</a>
			<a href="#"><span class="glyphicon glyphicon-star-empty"></span> Astrology</a>
			<a href="#"><span class="glyphicon glyphicon-list-alt"></span> News</a>
			<a href="#"><span class="glyphicon glyphicon-briefcase"></span> Jobs</a>
			<a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Movies</a>
			<a href="#"><span class="glyphicon glyphicon-cutlery"></span> Wellness</a>
			<a href="#"><span class="glyphicon glyphicon-grain"></span> Family Tree</a>
			<a href="#"><span class="glyphicon glyphicon-knight"></span> Games</a>
			<a href="#"><span class="glyphicon glyphicon-phone"></span> Mobile App</a>
			<a href="#"><span class="glyphicon glyphicon-pencil"></span> Akblog</a> -->
	</div>

	<div id="liveFeed">

		<!-- ################ Live Traffic Feed ################################## -->

		<div style="clear: both;">
			
			<script type="text/javascript" src="http://feedjit.com/serve/?vv=1515&amp;tft=3&amp;dd=0&amp;wid=&amp;pid=0&amp;proid=0&amp;bc=FFFFFF&amp;tc=000000&amp;brd1=DDDDDD&amp;lnk=639CF1&amp;hc=999999&amp;hfc=F5F5F5&amp;btn=C99700&amp;ww=180&amp;wne=8&amp;srefs=0">
			</script>
			
			<noscript>
				<a href="http://feedjit.com/">Live Traffic Stats</a>
			</noscript>

		</div>

		<!-- ################ Live Traffic Feed ################################## -->

	</div>

</div>
