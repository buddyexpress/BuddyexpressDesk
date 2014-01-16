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

class BUDDYEXPRESS_DESK_COM {
/**
* BuddyDesk get list;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
public function getList(){
	
    $dir = buddyexpressdesk_route()->com;
	$components_ids = array();
	$handle = opendir($dir);

	if ($handle) {
		while ($components_id = readdir($handle)) {
			if (substr($components_id, 0, 1) !== '.' 
					   && is_dir($dir . $components_id)
					   && !preg_match('/\s/', $components_id)
					   && is_file($dir.$components_id.'/buddyexpressdesk_com.php')
					   && is_file($dir.$components_id.'/buddyexpressdesk_com.xml')) {
				$components_ids[] = $components_id;
			}
		}
	}

	sort($components_ids);
    return $components_ids;

}
/**
* BuddyDesk get Com;
* @params : $name = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function getCOM($name){
	$name = trim($name);
 if(!preg_match('/\s/',$name)){
       $dir = buddyexpressdesk_route()->com;
	   $com = $dir.$name;
       $com = simplexml_load_file($com.'/buddyexpressdesk_com.xml');
	   return $com;
  }
return false;			
}
/**
* BuddyDesk enable com;
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function ENABLE($com){
if(!empty($com) && is_dir(buddyexpressdesk_route()->com.$com)){	
	$ENABLE = new BDESK_DB;
	/**
	* Get a com;
	* @last edit: $arsalanshah
    * @Reason: Initial;
	*/
	$ENABLE->statement("SELECT * FROM bdesk_components WHERE (com_id='$com')");
	$ENABLE->execute();
	$CHECK = $ENABLE->fetch();
	/**
	* Update com status;
	* @last edit: $arsalanshah
    * @Reason: Initial;
	*/
    if(isset($CHECK['active']) && $CHECK['active'] == 0){
	$ENABLE = new BDESK_DB;	
	$ENABLE->statement("UPDATE bdesk_components SET active='1' WHERE (com_id='$com')");
	$ENABLE->execute();
	return true;
	} 
	elseif(!$CHECK){
	$ENABLE = new BDESK_DB;	
	/**
	* Update com  status;
	* @last edit: $arsalanshah 
    * @Reason: Initial;
	*/
	$ENABLE->statement("INSERT INTO `bdesk_components` (`com_id`, `active`) VALUES ('$com', '1')");
	$ENABLE->execute();
	return true;
	}
}
return false;
}
/**
* BuddyDesk check com status; 
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
public function CHECK($com = NULL){
if(!empty($com)){	
	$ENABLE = new BDESK_DB;
	$ENABLE->statement("SELECT * FROM bdesk_components WHERE (com_id='$com')");
	$ENABLE->execute();
	$CHECK = $ENABLE->fetch();
	if(isset($CHECK['active']) && $CHECK['active'] == 1){
	return true;	
	}
	if(!$CHECK || isset($CHECK['active']) && $CHECK['active'] == 0){
	return false;	
	}
}
return false;
}
/**
* BuddyDesk disable com;
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function DISABLE($com = NULL){
if(!empty($com)){	
	$DISABLE = new BDESK_DB;
	$DISABLE->statement("UPDATE bdesk_components SET active='0' WHERE (com_id='$com')");
	$DISABLE->execute();
	return true;
}
return false;
}
/**
* BuddyDesk get all active coms;
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function getActive(){
	$GET = new BDESK_DB;
    $GET->statement("SELECT * FROM bdesk_components WHERE (active=1)");
	$GET->execute();
	$GET = $GET->fetch(true);
	if($GET){
	return $GET;
	}
return false;	
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
* BuddyDesk get total coms;
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function BuddyDesk_Version(){
	   $dir = buddyexpressdesk_route()->www;
	   $version = $dir;
       $version = simplexml_load_file($version.'/BuddyexpressDesk.xml');
	   if(!empty($version->version)){
	   return $version->version;
	   }
	return false;   
}

}