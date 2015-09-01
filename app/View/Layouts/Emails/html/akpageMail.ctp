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
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $title_for_layout; ?></title>
</head>
<body>


<!-- ############################################################################### -->

<?php $akpageUrl = "http://dev.akpage.com/"; ?>

<div style=" margin :10px auto; width: 550px; height: auto; min-height: 400px; background-color: #edefed;">

	<div style=" padding: 20px; clear: both; margin: 50px 10px 10px 30px;">
		<?php echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/akpage_emailLogo.png', array('alt'=> 'Akpage Logo', 'width' => '150', 'height' => '50')), $akpageUrl, array('escape' => false)); ?>
	</div>

	<div style="  margin: auto; width: 400px; height: auto ; min-height: 200px;  background-color: #ffffff; border: 1px solid #ddd; padding : 20px; ">
		
		<?php echo $this->fetch('content'); ?>
		
	</div>
	
	 <div style= " width: 100%; text-align : center; ">
		<div style= "text-align : center; padding-top: 20px;">Join Us On</div>
		<div style= "text-align : center; padding: 10px 0px;">
			<?php echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/1.png' ,array('width' => '30', 'height' => '30')) ,'https://www.facebook.com/arekatikapage', array('escape' => false, 'style' => 'box-sizing: initial !important; padding: 10px;border: 1px solid #999999;border-radius: 50%;display: inline-block !important;', 'target'=>'_blank')); ?>
			<?php //echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/2.png' , array('width' => '30', 'height' => '30')),'https://plus.google.com/communities/100916794256727148764', array('escape' => false, 'style' => 'box-sizing: initial !important; padding: 10px;border: 1px solid #999999;border-radius: 50%;display: inline-block !important;', 'target'=>'_blank')); ?>
			<?php echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/3.png' , array('width' => '30', 'height' => '30')),'https://twitter.com/akpage', array('escape' => false, 'style' => 'box-sizing: initial !important; padding: 10px;border: 1px solid #999999;border-radius: 50%;display: inline-block !important;', 'target'=>'_blank')); ?>
			<?php echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/4.png' , array('width' => '30', 'height' => '30')),'https://www.linkedin.com/company/akpage', array('escape' => false, 'style' => 'box-sizing: initial !important; padding: 10px;border: 1px solid #999999;border-radius: 50%;display: inline-block !important;', 'target'=>'_blank')); ?>
			<?php echo $this->Html->link($this->Html->image($akpageUrl.'img/emailIcons/5.png' , array('width' => '30', 'height' => '30')),'https://www.instagram.com/akpage', array('escape' => false, 'style' => 'box-sizing: initial !important; padding: 10px;border: 1px solid #999999;border-radius: 50%;display: inline-block !important;','target'=>'_blank')); ?>
			
		</div>
	</div>
	 
	
</div>	


</body>
</html>
