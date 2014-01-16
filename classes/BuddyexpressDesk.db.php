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

class BDESK_DB {
/**
* BuddyDesk construct a BDESK_DB;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function CONNECT(){
$settings = buddyexpressdesk_db();	
$connect =  new mysqli(
					   $settings->host, 
					   $settings->user, 
					   $settings->password, 
					   $settings->database
					   );
if(!$connect->connect_errno){
   return $connect;	
} 
else {
   return false;
} 

}
/**
* BuddyDesk prepare a new statement;
* @params: $query  = statement;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function statement($query){
if(!empty($query)){	
	$this->query =  $query;
}
 return false;
}
/**
* BuddyDesk execute a generated statement;
* @params: $query  = statement;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function execute(){
	if(isset($this->query) && !empty($this->query)){
		$this->exe = $this->connect()->query($this->query);
		$this->exe;
		unset($this->query);
		$this->connect()->close();
		return true;
	}
return false;	
}
/**
* BuddyDesk fetch data;
* @params: $query  = statement;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function fetch($data = false){
if(isset($this->exe)){	
         if($data !== true){         
	        if($fetch = $this->exe){
      	      return $fetch->fetch_assoc();  
             }
		 }
		 if($data === true){
	        if($fetch = $this->exe){
			    while($all = $fetch->fetch_assoc()) {
                       $alldata[] = $all;
                  } 
			}
				  if(isset($alldata)){
					return $alldata;  
				  }
		 }
		 
}
return false;
}

}//CLASS