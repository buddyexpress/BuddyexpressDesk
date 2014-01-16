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
				 'contents' =>  buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/contents/login')
			);
echo buddyexpressdesk_view_page('Login', buddyexpressdesk_layout_view('login', $content), 'login');