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
$EDIT = new  BuddyexpressDesk_Article;
$EDIT = $EDIT->EDIT(input('title'), array(
					'id' => input('id'),
					'article' => input('article'),
					));
if($EDIT){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:article:edited'));
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");
  }
else {
   buddyexpressdesk_message(buddyexpressdesk_print('admin:article:edit:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/article';
  header("Location: $location");
 }