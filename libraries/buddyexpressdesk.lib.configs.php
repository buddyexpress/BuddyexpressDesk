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
/**
* Get a website url;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_site_url(){
	global $BuddyexpressDesk;
	include_once(buddyexpressdesk_route()->configs.'buddyexpress.config.site.php');
	return $BuddyexpressDesk->url;
}
/**
* Get a database settings;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_db(){
	global $BuddyexpressDesk;
	include_once(buddyexpressdesk_route()->configs.'buddyexpress.config.db.php');
    $db = new stdClass;
 	$defaults = array(
		'host'			=>	$BuddyexpressDesk->host,
		'user'          => $BuddyexpressDesk->user,
		'password'      => $BuddyexpressDesk->password,
		'database'         => $BuddyexpressDesk->database
		);

	foreach ($defaults as $name => $value) {
		if (empty($paths->$name)) {
			$db->$name = $value;
		}
	}
	return $db;
}