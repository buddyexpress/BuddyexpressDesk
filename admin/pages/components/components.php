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

$title = buddyexpressdesk_print('admin:com');
$content = array(
				 'contents' =>  buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/contents/components/components')
			);
echo buddyexpressdesk_view_page($title, buddyexpressdesk_layout_view('article', $content),'administrator');