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
$template = input('template');
if(!empty($template)){

$ENABLE = new BUDDYEXPRESS_DESK_TEMPLATE;
if($ENABLE->ENABLE($template)){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:template:enabled'));
  $location = buddyexpressdesk_site_url().'administrator/templates';
  header("Location: $location");	
} 
else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:template:enabled:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/templates';
  header("Location: $location");
}



} 
else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:template:unknown'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/templates';
  header("Location: $location");
	
}