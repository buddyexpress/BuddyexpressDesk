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
$lang = buddyexpressdesk_print('lang:changed');
if(update_language(input('lang'))){
   buddyexpressdesk_message($lang, 'buddyexpressdesk-message-system');
   $location = buddyexpressdesk_site_url().'administrator/settings';
   header("Location: $location");	
   exit;
} 
else {
   buddyexpressdesk_message(buddyexpressdesk_print('lang:change:error'), 'buddyexpressdesk-message-error');
   $location = buddyexpressdesk_site_url().'administrator/settings';
   header("Location: $location");	
   exit;	
}