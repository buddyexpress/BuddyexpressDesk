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
* Setup a paths for BuddyDesk
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_route(){
    $paths = new stdClass;
 	$root = str_replace("\\", "/", dirname(dirname(__FILE__)));
	$defaults = array(
		'www'			=>	"$root/",
		'libs'			=>	"$root/libraries/",
		'classes'		=>	"$root/classes/",
		'actions'		=>	"$root/actions/",
		'locale'		=>	"$root/locale/",
		'sys'		=>	"$root/system/",
		'configs'		=>	"$root/configurations/",
		'templates'		=>	"$root/templates/",
		'pages'		=>	"$root/pages/",
		'com'		=>	"$root/components/",
		'admin'		=>	"$root/admin/",
		'forms'		=>	"$root/forms/",

);

	foreach ($defaults as $name => $value) {
		if (empty($paths->$name)) {
			$paths->$name = $value;
		}
	}
	return $paths;
}
function alternate_get_url($params = ''){
		$protocol = 'http';
		$uri = $_SERVER['REQUEST_URI'];
		if($params == true){ $uri = substr($uri, 0, $uri); }
		if (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$protocol = 'https';}
		$port = ':' . $_SERVER["SERVER_PORT"];
		if ($port == ':80' || $port == ':443'){
       		if($params == true){ $port = ''; }
		}
		$url = "$protocol://{$_SERVER['SERVER_NAME']}$port{$uri}";
		return $url;
}		