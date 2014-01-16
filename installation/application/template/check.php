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

echo '<div><div class="layout-article"><h2>'.bframework_print('bdesk:settings').'</h2><br /><div style="margin:0 auto; width:900px;">';
if(substr(PHP_VERSION, 0, 6) >= 5.3){
        echo '<div class="bframework_msg bframework-success"> PHP '.PHP_VERSION.' </div>';
} else {
	  echo '<div class="bframework_msg bframework-fail">You have old PHP '.PHP_VERSION.'. You need PHP 5.3 or Higher </div>';
      $error[] = 'php';
  
}
if(preg_match('/apache/i', $_SERVER["SERVER_SOFTWARE"])){
        echo '<div class="bframework_msg bframework-success"> Apache Found </div>';
} else {
	  echo '<div class="bframework_msg bframework-fail">BuddyexpressDesk can only be run on Apache server.</div>';
	  $error[] = 'apache';
}    

echo '<br />';
echo '<form action="'.bframework_get_url().'settings">';
if(!isset($error)){ 
        echo '<input style="float:right;" type="submit" value="Next" class="button-blue primary">';
} 

echo '</form></div><br /><br /></div>';
