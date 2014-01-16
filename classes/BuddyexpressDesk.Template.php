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

class BUDDYEXPRESS_DESK_TEMPLATE {
/**
* BuddyDesk get list;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/		
public static function getList(){
	
    $dir = buddyexpressdesk_route()->templates;
	$templates_ids = array();
	$handle = opendir($dir);

	if ($handle) {
		while ($templates_id = readdir($handle)) {
			if (substr($templates_id, 0, 1) !== '.' 
					   && is_dir($dir . $templates_id)
					   && !preg_match('/\s/', $templates_id)
					   && is_file($dir.$templates_id.'/buddyexpressdesk_template.php')
					   && is_file($dir.$templates_id.'/buddyexpressdesk_template.xml')) {
				$templates_ids[] = $templates_id;
			}
		}
	}

	sort($templates_ids);
    return $templates_ids;

}
/**
* BuddyDesk get total coms;
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function TOTAL(){
  if(count($this->getList()) > 0){
  return count($this->getList());
  } 
  else{
	  return 0;  
  }
}
/**
* BuddyDesk get template;
* @params : $name = name of template
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function getTEMPLATE($name){
  $name = trim($name);
 if(!preg_match('/\s/',$name)){
       $dir = buddyexpressdesk_route()->templates;
	   $template = $dir.$name;
       $template = simplexml_load_file($template.'/buddyexpressdesk_template.xml');
	   return $template;
  }
return false;			
}
/**
* BuddyDesk enable com;
* @params : $com = name of template
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function ENABLE($template){
if(!empty($template)){	
	$ENABLE = new BDESK_DB;
	$ENABLE->statement("UPDATE bdesk_site SET template='$template' WHERE (id=1)");
	if($ENABLE->execute()){
	return true;	
	}
}
return false;
}
/**
* BuddyDesk get active template;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
public static function getActive(){
	$CHECK = new BDESK_DB;
	$CHECK->statement("SELECT * FROM bdesk_site WHERE (id=1)");
	$CHECK->execute();
	$CHECK = $CHECK->fetch();
	if(isset($CHECK['template'])){
	return $CHECK['template'];	
	}
return false;
}

}