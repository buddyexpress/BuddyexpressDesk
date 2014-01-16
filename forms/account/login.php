<?php
/**
 * Buddyexpress Desk
 *
 * @package   Bdesk
 * @author    Buddyexpress Core Team <admin@buddyexpress.net
 * @copyright 2014 BUDDYEXPRESS NETWORKS.
 * @license   Buddyexpress Public License http://www.buddyexpress.net/Licences/bpl/ 
 * @link      http://labs.buddyexpress.net/bdesk.b
 */

$form = '<div id="container"><div id="login">';

$form .= '<table class="form" ><tr><td colspan="2" style="color: #a31500;"></td></tr>';
				
$form .= '<tr><th colspan="2"><img src="'.buddyexpressdesk_site_url().'images/login.jpg"/></tr>';
$form .=  '<tr><th colspan="2">'.buddyexpressdesk_print("form:login:account").'</th></tr><tr>';

$form .=   '<th>'.buddyexpressdesk_print("form:email").'</th><td><input type="text" name="email" /></td></tr><tr>';

$form .=	'<th>'.buddyexpressdesk_print("form:password").'</th><td><input type="password" name="password" /></td>';
					
$form .=	'</tr><tr><th></th><td><input type="submit" value="Login" class="button primary"/></td></tr><tr>';
					
$form .=	'<th></th><td><div style="color: #D65151;font-weight: bold;">
					  '.display_error_messages().'</div></td>
				  </tr></table></div></div>';
	
echo($form);	
