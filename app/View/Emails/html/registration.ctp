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
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php

$loginUrl = "http://dev.akpage.com/users/login";

$content = "Hi, "."<br /> 

Welcome to Akpage.<br />
To activate your account, you'll need to verify by pasting this verification code in the verification page after log-in to Akpage:<p><b>".$verificationCode."</b></p>".

$this->Html->link('Click Here', $loginUrl, array('escape' => false)). " to login to Akpage. </br></br>


Should you need any further assistance, please contact our customer service at service@akpage.com <br />

Thanks from Akpage";

$content = explode("\n", $content);

foreach ($content as $line):
	echo '<p> ' . $line . "</p>\n";
endforeach;

?>
