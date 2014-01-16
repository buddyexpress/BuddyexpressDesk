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
global $BuddyexpressDesk;
if (!isset($BuddyexpressDesk)) {
	$BuddyexpressDesk = new stdClass;
} 

include_once(
			 dirname(dirname(__FILE__)).'/libraries/buddyexpressdesk.lib.route.php'
			 );
include_once(
			 buddyexpressdesk_route()->configs.'libraries.php'
			 );
include_once(
			 buddyexpressdesk_route()->configs.'classes.php'
			 );


$files_configs = array(
					   'buddyexpress.config.site.php',
					   'buddyexpress.config.db.php',
					   );
if(!is_file(buddyexpressdesk_route()->configs.$files_configs[0]) 
	|| !is_file(buddyexpressdesk_route()->configs.$files_configs[1])){
	    $location = alternate_get_url();
		header("Location: {$location}installation/check");
		exit;
}

include_once(
			 buddyexpressdesk_route()->configs.'buddyexpress.config.site.php'
			 );
session_start();
foreach($BuddyexpressDesk->classes as $class){
     if(!include_once(buddyexpressdesk_route()->classes."BuddyexpressDesk.{$class}.php")){
		 throw new exception('Cannot include all classes'); 
	 }
}
foreach($BuddyexpressDesk->libraries as $lib){
     if(!include_once(buddyexpressdesk_route()->libs."buddyexpressdesk.lib.{$lib}.php")){
		 throw new exception('Cannot include all libraries'); 
	 }
}

