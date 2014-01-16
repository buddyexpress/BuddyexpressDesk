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

class BUDDYDESK_INSTALL {
/**
* Get database user;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function dbusername($username){
	if(!empty($username)){
	   $this->dbusername = $username;	
	} 
	else {
	  $this->dbusername = 'root';	
	}
}
/**
* Get db password;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function dbpassword($password){
	   $this->dbpassword = $password;	
}
/**
* Get databasename;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function dbname($dbname){
	if(!empty($dbname)){
	   $this->dbname = $dbname;	
	} 
	else {
	   $this->dbname = 'BuddyexpressDesk';	
	}
}
/**
* Get db host;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function dbhost($dbhost){
	if(!empty($dbhost)){
	   $this->dbhost = $dbhost;	
	} 
	 else {
		   $this->dbhost = 'localhost';		
	}
}
/**
* Get web url;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function weburl($weburl){
	if(!empty($weburl)){
	   $this->weburl = $weburl;	
	}
}
/**
* Connect to database;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function dbconnect(){	
$connect =  new mysqli(
					   $this->dbhost, 
					   $this->dbusername, 
					   $this->dbpassword, 
					   $this->dbname
					   );
if($connect->connect_errno){
	exit(mysqli_connect_error());
} 
else {
    	return $connect;
}

}
/**
* Database configuration;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function configurations_db(){
$params = array(
		'host' => $this->dbhost,
		'user' => $this->dbusername,
		'password' => $this->dbpassword,
		'dbname' => $this->dbname
);
$this->path = str_replace('installation/application/', '' , bframework_get_approot_path());
$templateFile = $this->path."configurations/buddyexpress.config.db.example.php";
$template = file_get_contents($templateFile);
if (!$template) {
			throw new Exception('All files are required please check your files');
}

foreach ($params as $k => $v) {
	$template = str_replace("<<" . $k . ">>", $v, $template);
}

$settingsFilename = $this->path."configurations/buddyexpress.config.db.php";
$result = file_put_contents($settingsFilename, $template);
if (!$result) {
		return false;
}

return true;	
}
/**
* Web site configuration;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function configurations_site(){
$params = array(
		'url' => $this->weburl
);
$this->path = str_replace('installation/application/', '' , bframework_get_approot_path());
$templateFile = $this->path."configurations/buddyexpress.site.config.example.php";
$template = file_get_contents($templateFile);
if (!$template) {
			throw new Exception('All files are required please check your files');
}

foreach ($params as $k => $v) {
	$template = str_replace("<<" . $k . ">>", $v, $template);
}

$settingsFilename = $this->path."configurations/buddyexpress.config.site.php";
$result = file_put_contents($settingsFilename, $template);
if (!$result) {
		return false;
}

return true;	
}
/**
* Process Data;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public function INSTALL(){
if ($script = file_get_contents(bframework_get_approot_path().'sql/buddyexpressdesk.sql')) {
		$errors = array();
        $script = preg_replace('/\-\-.*\n/', '', $script);
        $sql_statements = preg_split('/;[\n\r]+/', $script);

		foreach ($sql_statements as $statement) {
			$statement = trim($statement);
			if (!empty($statement)) {
				try {
					$this->dbconnect()->query($statement);
				} catch (Exception $e) {
					$errors[] = $e->getMessage();
				}
			}
		}
		$this->configurations_db();
		$this->configurations_site();
		if (!empty($errors)) {
			$errortxt = "";
			foreach ($errors as $error) {
				$errortxt .= " {$error};";
			}

			$msg = $errortxt;
			throw new Exception($msg);
		}
	} 
	return true;
}	
/**
* Installation Url;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
public  static function url(){
   return str_replace('installation/','', bframework_get_url());	
}
}
