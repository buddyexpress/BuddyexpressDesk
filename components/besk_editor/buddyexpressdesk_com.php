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

$plugin = 'besk_editor';
define('COM_EDITOR_WWW', buddyexpressdesk_route()->com.$plugin);
buddyexpressdesk_register_view('BuddyexpressDesk/page/admin/head', COM_EDITOR_WWW.'/head/editor.php');
buddyexpressdesk_register_view('BuddyexpressDesk/page/admin/head/js', 'base_url_bdesk_editor');

function base_url_bdesk_editor($context, $params = false, $url){ 
 $baseurl = buddyexpressdesk_site_url();	
 return 'bdesk_edtior_url = "'.$baseurl.'"';
}
