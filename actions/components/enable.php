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
$com = input('com');
if(!empty($com)){

$ENABLE = new BUDDYEXPRESS_DESK_COM;
if($ENABLE->ENABLE($com)){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:com:enabled'));
  $location = buddyexpressdesk_site_url().'administrator/components';
  header("Location: $location");	
} 
else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:com:enabled:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/components';
  header("Location: $location");
}



} 
else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:com:unknown'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/components';
  header("Location: $location");
	
}