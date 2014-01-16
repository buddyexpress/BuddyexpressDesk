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
 
$email = sanitize_email('email'); 
$password  = input('password');
if(empty($email) || empty($password)){
   buddyexpressdesk_message(buddyexpressdesk_print('site:login:error:1'), 'buddyexpressdesk-message-error');
   $location = buddyexpressdesk_site_url().'administrator/login';
   header("Location: $location");	
   exit;
}
if(BDESK_LOGIN(sanitize_email('email'), input('password'))){
    buddyexpressdesk_message(buddyexpressdesk_print('site:login:done'));
    $location = buddyexpressdesk_site_url().'administrator/';
    header("Location: $location");	
} else {
    buddyexpressdesk_message(buddyexpressdesk_print('site:login:failed'), 'buddyexpressdesk-message-error');
    $location = buddyexpressdesk_site_url().'administrator/login';
   header("Location: $location");	
}
