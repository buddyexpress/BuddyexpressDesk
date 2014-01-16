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
* Register a language in system;
* @params: $code = code of language;
* @params: $file = file which contain languages;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_register_language($code = '', $file){
	if(isset($code) && isset($file)){
		global $BuddyexpressDesk;
		return $BuddyexpressDesk->locale[$code][] = $file;
	}
	
}
/**
* Get a languages strings;
* @params: $code = code of language;
* @params: $params = strings;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_register_languages($code , $params = array()){
		global $BuddyexpressDesk;
		if(isset($BuddyexpressDesk->localestr[$code], $code)){
		$params = array_merge($BuddyexpressDesk->localestr[$code], $params);		
		}
		return $BuddyexpressDesk->localestr[$code] = $params;
}
/**
* Get registered language codes;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_locales(){
	global $BuddyexpressDesk;
	  foreach($BuddyexpressDesk->locale as $key => $val){
		 $keys[] = $key;  
	  }
	  if(!empty($keys)){
		return $keys;  
	  } 
	  else {
		 		return array();  
 
   }
}
/**
* Print a locale;
* @params $id = id of locale;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_print($id = ''){
global $BuddyexpressDesk;
$id = strtolower($id);
$code = buddyexpressdesk_settings()->default_lang;
if(!empty($BuddyexpressDesk->localestr[$code][$id])){
      return $BuddyexpressDesk->localestr[$code][$id];
} 
else {
   return $id;	
}

}
/**
* Change user language;
* @params $id = id of locale;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function update_language($lang){
if(!empty($lang)){
    $SET = new BDESK_DB;
    $SET->statement("UPDATE bdesk_site SET default_lang='$lang'");
    if($SET->execute()){
    	return true;	
    }
}
return false;
}