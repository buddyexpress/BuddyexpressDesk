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
  
buddyexpressdesk_register_view('BuddyexpressDesk/page/admin/head', buddyexpressdesk_route()->admin.'views/head');
/**
* Setup a user login function;
* @params: $email = email of a user who is trying to login;
* @params:  $password = password of user in plain text;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function BDESK_LOGIN($email, $password){
$LOGIN = new BDESK_DB;
$LOGIN->statement("SELECT * FROM bdesk_users WHERE (email='$email')");
$LOGIN->execute();
$LOGIN = $LOGIN->fetch();
if(md5($password) == $LOGIN['password']){
	$_SESSION['buddyexpressdesk.user.admin'] = $LOGIN['email'];
    return true;
}
return false;

}
/**
* Check if admin is logged in or not;
* @Required: current session;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function admin_loggedin(){
if(isset($_SESSION['buddyexpressdesk.user.admin'])
				   && !empty($_SESSION['buddyexpressdesk.user.admin'])){
					return true;												   
}
return false;
}
function get_admin(){
	if(isset($_SESSION['buddyexpressdesk.user.admin'])
				   && !empty($_SESSION['buddyexpressdesk.user.admin'])){
        return $_SESSION['buddyexpressdesk.user.admin'];	
	}
}
/**
* Logout out current session;
* @Required: current session;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function logout(){
	if(isset($_SESSION['buddyexpressdesk.user.admin'])){
            unset($_SESSION['buddyexpressdesk.user.admin']);
			session_destroy();
     }
}
/**
* Validate a email address;
* @pramas: $email = email you want to validate;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function sanitize_email($email){
$email = $_REQUEST[$email];
if(filter_var($email, FILTER_SANITIZE_EMAIL)){
     return filter_var($email, FILTER_SANITIZE_EMAIL);	
}
return false;
}
/**
* Save account settings;
* @params: $email = email of a user who is trying to login;
* @params:  $password = password of user in plain text;
* @last edit: $arsalanshah
*/
function save_settings_account($email, $newemail, $oldpassword, $password){
if(!empty($email) && !empty($oldpassword) && !empty($password)){
	$SAVE = new BDESK_DB;
	$SAVE->statement("SELECT * FROM bdesk_users WHERE (email='$email')");
	$SAVE->execute();
	$CHECK = $SAVE->fetch();
       if($CHECK['password'] == md5($oldpassword)){
		    $newpassword = md5($password);
		    $SAVE = new BDESK_DB;
		  	$SAVE->statement("UPDATE bdesk_users SET password='$newpassword', email='$newemail' WHERE (email='$email' AND uid='1')");
 	          if($SAVE->execute()){
				  $_SESSION['buddyexpressdesk.user.admin'] = $newemail; 
			      return true;	
			   }	
			    else {
			    return false;	
			 }
	   }
	}
return false;	
}
/**
* Get user by email
* @params: $email = email of a user;
* @last edit: $arsalanshah
* @reason: Initial;
* 
*/
function user($email){
	if(!empty($email)){
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_users WHERE (email='$email')");
	$GET->execute();
	return $GET->fetch();
	}
}
/**
* Get user by user id
* @params: $uid = id of user in database;
* @last edit: $arsalanshah
* @reason: Initial;
* 
*/
function get_user_by_uid($uid){
	if(!empty($uid)){
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_users WHERE (uid='$uid')");
	$GET->execute();
	return $GET->fetch();
	}
return false;	
}

/**
* Register settings page for component
* @params: $name = valid name of component;
* @last edit: $arsalanshah
* @reason: Initial;
* 
*/
function buddyexpressdesk_register_settings($name, $file_func){	
    	BUDDYEXPRESS_DESK_COM::registerSettings($name, $file_func);
}