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
$ADD = new  BuddyexpressDesk_Article;
if($ADD->ADD(input('article'), input('title'))){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:added'));
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");
} 
  else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:added:failed'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");	
 }

