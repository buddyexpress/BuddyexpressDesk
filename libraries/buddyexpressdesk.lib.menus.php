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
* Register a menu;
* @params: $name  = name of menu;
* @params:  $text = text for menu;
* @params $link = link for menu;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpress_register_menu_link($name , $text, $link ,$for = 'site'){
		global $BuddyexpressDesk;
		return $BuddyexpressDesk->menu[$for][$name][$text] = $link;
}
/**
* Fetch a menu for front end;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_site_menu(){
	global $BuddyexpressDesk;
	return $BuddyexpressDesk->menu['site'];
}
/**
* Fetch a menu for back end;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_admin_menu(){
	global $BuddyexpressDesk;
	return $BuddyexpressDesk->menu['admin'];
}
/**
* Unregister menu from system;
* @params: $menu = menu name
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function unregister_menu($menu, $for = 'site'){
	global $BuddyexpressDesk;
	unset($BuddyexpressDesk->menu[$for][$menu]);
}
/**
* View a menu;
* @params: $menu = menu name
* @note This will fetch layout from defualt template that how menu should appear; check menu file for more info;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function view_menu($menu){
	return buddyexpressdesk_view(buddyexpressdesk_default_template().'menu/'.$menu);
}