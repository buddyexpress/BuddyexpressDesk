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
 
$VIEW = new stdClass;
$VIEW->register = array();

/**
* Include a specific file
* @params: $file = name of file;
* @params:  $params = args for file;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_include($file = '', $params = array()){
if(!empty($file) && is_file($file)){
   ob_start(); $params = $params;	
   include_once($file);
   $contents = ob_get_clean();
   return $contents;
 }
  
}
/**
* Include a specific file
* @params: $file = name of file;
* @params:  $params = args for file;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_view($path = '', $params = array()){
if(isset($path) && !empty($path)){
   return buddyexpressdesk_include($path.'.php', $params);
  }
}
/**
* Register a view;
* @params: $view = path of view;
* @params: $file = file for view;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_register_view($views, $file){
global $VIEW;	
$result = $VIEW->register[$views][] = $file;  
return $result;
}
/**
* Fetch a register view;
* @params: $layout = name of view;
* @params:  $params = args for file;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_fetch_views($layout, $params = array()){ 
global $VIEW;
if(isset($VIEW->register[$layout]) && !empty($VIEW->register[$layout])){
foreach($VIEW->register[$layout] as $file){
	$fetch[] = buddyexpressdesk_view(str_replace('.php', '',$file), $params);
  }   
return implode('', $fetch);  
}
}
/**
* Unregister a view from system
* @params: $layout = name of view;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_remove_layoutview($layout){
	global $VIEW;	
	unset($VIEW->register[$layout]);
}
/**
* Add a context to page
* @params: $cntext = name of context;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_add_context($context){
	global $VIEW;	
	$add = $VIEW->context = $context;
	return $add;
}
/**
* Check the if are in registered context or not
* @params: $context = name of context;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_is_context($context){
	global $VIEW;	
	if(isset($VIEW->context) && $VIEW->context == $context){
	return true;	
	}
return false;	
}
/**
* Register a page handler;
* @params: $handler = page;
* @params: $function = function which handles page;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_register_page($handler, $function){
global  $BuddyexpressDesk;
$pages = $BuddyexpressDesk->page[$handler] = $function;
return $pages;
}
/**
 * Execute a page.
 *
 * If page is not registered then user will see a 404 page;
 *
 * @params: #handler  = page handler;
 * @params:  $page = subpage;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 * @return void
 * @access private
 */

function buddyexpressdesk_load_page($handler, $page){
global $BuddyexpressDesk;
$page = explode('/', $page);
if(isset($BuddyexpressDesk->page) 
		 && isset($BuddyexpressDesk->page[$handler]) 
		 && !empty($handler) 
		 && is_callable($BuddyexpressDesk->page[$handler])){
                    echo call_user_func($BuddyexpressDesk->page[$handler], $page);
} 
else {      
           echo '404-load';
}

}
/**
* Fetch active template name;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_default_template(){
  $default = new BUDDYEXPRESS_DESK_TEMPLATE;
  return buddyexpressdesk_route()->templates.$default->getActive().'/';	
}

/**
* Fetch a layout;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_layout_view($layout , $params = array()){
if(!empty($layout)){
     if(is_file(buddyexpressdesk_default_template()."layout/{$layout}.php")){
     $result =  buddyexpressdesk_view(buddyexpressdesk_default_template()."layout/{$layout}", $params);
	 return $result; 
	 } 
   }	 		
}
/**
* View page;
*
* @params : $title = tile for page;
* @params : $content = content for page;

* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_view_page($title, $content, $page = 'page'){
if(is_file(buddyexpressdesk_default_template()."{$page}.php")){	
      include_once(buddyexpressdesk_default_template()."{$page}.php");	
}
}