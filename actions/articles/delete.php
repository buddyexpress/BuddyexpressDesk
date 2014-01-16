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
$ARTICLE = input('id');
if(!empty($ARTICLE)){
$DELETE = new  BuddyexpressDesk_Article;
if($DELETE->DELETE(base64_decode($ARTICLE))){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:deleted'), 'buddyexpressdesk-message-system');
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");
} 
  else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:delete:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");	
 }

}
 else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");	
 }