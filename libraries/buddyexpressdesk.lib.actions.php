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
* Register a form action;
* @params: $action  = name of action;
* @params:  $file = file to action;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_register_action($action, $file){
global  $BuddyexpressDesk;
$actions = $BuddyexpressDesk->action[$action] = $file;
return $actions;
}
/**
 * Execute a action.
 *
 * If action is not registered then user will see a 404 page;
 *
 * @params: action  = name of action;
 * @params:  $file = file to action;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 * @return void
 * @access private
 */

function buddyexpressdesk_action($action){
	  global  $BuddyexpressDesk;
      if(array_key_exists($action, $BuddyexpressDesk->action)){
                 if(is_file($BuddyexpressDesk->action[$action])){
	                   include_once($BuddyexpressDesk->action[$action]);
	             }
      } 
       else { 
        echo  page_404();
        exit();
      }
}