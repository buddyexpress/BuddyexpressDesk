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

$email =  user(get_admin()); 
$form = 
'<input 
     type="text" 
     name="email"  
     value="'.$email['email'].'"
     placeholder="'.buddyexpressdesk_print('form:email').'"
/>
<p></p>';

$form .= '<input 
     type="text" 
     name="newemail" 
     placeholder="New Email"
/>
<p></p>';

$form .= '<input 
     type="password" 
     name="oldpwd" 
     placeholder="'.buddyexpressdesk_print('form:old:password').'"
/>
<p></p>';

$form .= '<input 
    type="password" 
    name="newpwd" 
    placeholder="'.buddyexpressdesk_print('form:new:password').'"
/>
<p></p>';

$form .= '<input 
  type="submit" 
  class="buddyexpressdesk-button-submit" 
  value="'.buddyexpressdesk_print('form:save').'"
/>';

echo($form);