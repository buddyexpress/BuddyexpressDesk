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
public static function getList(){
	
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
public static function getCOM($name){
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
public static function ENABLE($com){
if(!empty($com) && is_dir(buddyexpressdesk_route()->com.$com)){	
	$ENABLE = new BDESK_DB;
	/**
	* Get a com;
	* @last edit: $arsalanshah
    * @Reason: Initial;
	*/
	$ENABLE->statement("SELECT * FROM bdesk_components 
			    WHERE (com_id='$com');"
			  );
	$ENABLE->execute();
	$CHECK = $ENABLE->fetch();
	/**
	* Update com status;
	* @last edit: $arsalanshah
    * @Reason: Initial;
	*/
    if(isset($CHECK['active']) && $CHECK['active'] == 0){
	$ENABLE = new BDESK_DB;	
	$ENABLE->statement("UPDATE bdesk_components 
			    SET active='1' 
			    WHERE (com_id='$com');"
			  );
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
	$ENABLE->statement("INSERT INTO `bdesk_components` 
			  (`com_id`, `active`) 
		          VALUES ('$com', '1')"
			  );
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
	$ENABLE->statement("SELECT * FROM bdesk_components 
			    WHERE (com_id='$com')"
			  );
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
	$DISABLE->statement("UPDATE bdesk_components 
			    SET active='0' WHERE (com_id='$com')"
			   );
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
    $GET->statement("SELECT * FROM bdesk_components 
		    WHERE (active=1);"
	  	   );
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
/**
* BuddyDesk Register Component Settings
* @params : $com = name of com
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function registerSettings($name, $file_func){
   global  $BuddyexpressDesk;
   if(!empty($name) 
			 && !empty($file_func) 
			 && is_dir(buddyexpressdesk_route()->com.$name)){
   $actions = $BuddyexpressDesk->settings[$name] = $file_func;
   return $actions;	
   }
  return false; 
}
/**
* Get all the componenets that have settings
* @params : Null
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function WithSettings(){
   global  $BuddyexpressDesk;
   if(!empty($BuddyexpressDesk->settings)){
   return $BuddyexpressDesk->settings;	
   }
  return false; 
}
/**
* Get a settings form for componenet
* @params : $form = name of form
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function getForm($form, $params = array()){
if(!empty($form) && is_callable($form)){	
   ob_start();
   call_user_func($form, $params);
   $form = ob_get_clean();
   return $form;
}

}
/**
* BuddyDesk Save settings for component
* @params : array();
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function SaveSettings($params = array()){
	if(!isset($params['com']) || isset($params['field'])){
	 exit;	
	}
	$com = $params['com'];
	$field = $params['field'];
	$value = $params['value'];
	if(empty($com) || empty($field)){
	  exit;	
	}
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_components_settings 
		            WHERE (com_id='$com' AND field='$field')"
		       );
	$GET->execute();
	$GET = $GET->fetch();
	
	/**
	* Insert if settings are empty
	* Require: $this{settings}
	* @lastupdat: $arsalanshah
	*/
	if(empty($GET)){
	$SAVE = new BDESK_DB;
	$SAVE->statement("INSERT INTO bdesk_components_settings 
		                 (`com_id`, `field`, `value`) 
			  VALUES ('$com', '$field', '$value');"
			 );
	$SAVE->execute();
	} 
	/**
	* Update if settings exisits
	* Require: $this{settings}
	* @lastupdat: $arsalanshah
	*/
	elseif(!empty($GET['field'])){
        $SET = new BDESK_DB;
 	$SET->statement("UPDATE bdesk_components_settings 
		        SET com_id='$com' , field='$field', value='$value' 
			WHERE(com_id='$com' AND field='$field');"
		       );
	$SET->execute();		
	}
}
/**
* BuddyDesk Save settings for component
* @params : array();
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function getSettings($com, $field){
	if(empty($com) || empty($field)){
	  exit;	
	}
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_components_settings 
		         WHERE (com_id='$com' AND field='$field')"
	      	       );
	$GET->execute();
	$GET = $GET->fetch();
	if(!empty($GET)){
	    return $GET['value'];	
	}
return false;	
}

}//class
