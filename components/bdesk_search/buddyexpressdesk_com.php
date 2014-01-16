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

$com = 'bdesk_search';
define('COM_SEARCH_WWW', buddyexpressdesk_route()->com.$com);
buddyexpressdesk_register_language('en', COM_SEARCH_WWW.'/locale/en.php');
buddyexpressdesk_register_language('de', COM_SEARCH_WWW.'/locale/de.php');
buddyexpressdesk_register_page('search', 'buddyexpressdesk_search_pagehandler');
function buddyexpressdesk_search_pagehandler($search){
	$page = $search[0];
    if(empty($page)){
	$page = 'search';
	}
	switch($page){		
    case 'search':
     echo buddyexpressdesk_view(COM_SEARCH_WWW.'/pages/search');
    break;
	
	default:
    	echo '404';
    break;

	}
}
