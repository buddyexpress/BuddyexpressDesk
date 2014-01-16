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
$title = buddyexpressdesk_print('site:article:view');
$content = array(
				 'contents' =>  buddyexpressdesk_view(buddyexpressdesk_route()->pages.'contents/articles/view', array('article' => $params['article']))
			);
echo buddyexpressdesk_view_page($title, buddyexpressdesk_layout_view('page_article', $content));