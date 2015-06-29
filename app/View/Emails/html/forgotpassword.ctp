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

//$verificationCode = "creothek".time();
$loginUrl = "http://akpagev1.btobz.com/users/login";

$content = "Hi,"."<br />

Welcome to Akpage.<br />
 		
Akpage received a request to change the password for your account:<p><b>New Password: ".$password."</b></p>".

$this->Html->link('Click Here', $loginUrl, array('escape' => false)). " Login to Akpage with this new password and chane your password immediately after login. </br></br>
 		
If you didn't change your password (or) need any further assistance, please contact us at service@akpage.com <br />

Thanks from Akpage";


$content = explode("\n", $content);

foreach ($content as $line):
	echo '<p> ' . $line . "</p>\n";
endforeach;

?>
