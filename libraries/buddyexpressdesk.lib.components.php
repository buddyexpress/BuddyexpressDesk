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
* Start a components;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
$COMS = new BUDDYEXPRESS_DESK_COM;
$COMS = $COMS->getActive();
if(isset($COMS) && !empty($COMS)){
foreach($COMS as $COM){
	   $START = buddyexpressdesk_route()->com.$COM['com_id'].'/buddyexpressdesk_com.php';
       if(is_file($START)){
		include_once($START);   
	   }
}
}
foreach($BuddyexpressDesk->locale[buddyexpressdesk_settings()->default_lang] as $locale){
		     //  if(is_file($locale)){
                include_once($locale);
			  // }
}
