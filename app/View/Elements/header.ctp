<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$creothekDescription = __d('cake_dev', 'Creothek :: Network for Creative People');
?>

<?php echo $this->Html->docType('html5'); ?>

<html lang="en">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta(array('name' => 'X-UA-Compatible', 'content' => 'IE=edge')); ?>
<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Akpage</title>

<!-- Bootstrap -->
<?php echo $this->Html->css(array('bootstrap.min')); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php echo $this->Html->css(array('myStyles')); ?>
<?php //echo $this->Html->script(array('jquery.min', 'jquery')); ?>


<?php 
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>


</head>

<body>

	<!-- ######### Facebook like box############## -->

	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1463504100542399";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- ######### Facebook like box############## -->

	<header class="navbar-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<?php echo $this->Html->link($this->Html->image('logomain_new.png', array('width' => '100%' , 'height' => '57px', 'alt' => 'logo', 'title' => 'Akpage Logo')), array('controller' => 'users', 'action' => 'home'), array('escape' => false)); ?>
				</div>
				
				
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
					
					<!-- ############## Google Search Box ################ -->
					
					<form action="http://www.google.co.in" id="cse-search-box">
						<div class="form-group home-search">
							<div class="span10">
								<input type="hidden" name="cx"
									value="partner-pub-6789047449171022:6261031974" /> <input
									type="hidden" name="ie" value="UTF-8" />
								<div class="col-sm-10 col-md-10 col-xs-7"
									style="padding-right: 0;">
									<input type="text" name="q" class="form-control" size="50" />
								</div>
								<div class="col-sm-2">
									<input type="submit" name="sa" value="Search"
										class="btn btn-info" />
								</div>
							</div>
						</div>
					</form>

					<script type="text/javascript"
						src="http://www.google.co.in/coop/cse/brand?form=cse-search-box&amp;lang=en">
					</script>
					
					<!-- ############## Google Search Box ################ -->

				</div>
				
				
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<?php if($currentUser) {
						/* echo "<pre>";
						 print_r($currentUser);
						exit; */
						if ($currentUser['group_id'] == 1) {
							echo '<span id="sgn">Welcome '.$this->html->link(__('Super Admin'), array('controller' => 'users', 'action' => 'index'))."</span>";
						}else if ($currentUser['group_id'] == 2) {
							echo '<span id="sgn">Welcome '.$this->html->link(__('Admin'), array('controller' => 'matrimonyUsers', 'action' => 'index'))."</span>";
						}else {

							echo '<span id="sgn" >Welcome '.$this->html->link(ucwords($currentUser['AkpageUser']['name']." ". $currentUser['AkpageUser']['surname']), array('controller' => 'users', 'action' => 'home'))."</span>";
						}
						echo '<span id="log-out" >'.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))."</span>";

			    }else { ?>
					<?php echo $this->element('login'); ?>
					<?php echo $this->element('register'); 

			    	}?>
				</div>
			</div>
		</div>
	</header>
	<!-- End of header -->
	<div class="container-fluid wrapper">