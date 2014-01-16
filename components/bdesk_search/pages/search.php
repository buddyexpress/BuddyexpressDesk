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

$content = array(
				 'contents' =>  buddyexpressdesk_view(COM_SEARCH_WWW.'/pages/contents/search'),
				 'title' => false,
			);
echo buddyexpressdesk_view_page(buddyexpressdesk_print('search:search'), buddyexpressdesk_layout_view('page_sidebar', $content));