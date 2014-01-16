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

$core = dirname(dirname(dirname(__FILE__)));
require_once(dirname(dirname(__FILE__)).'/bframework/buddyexpress.php'); 

if(is_file(bframework_get_approot_path().'INSTALLED')){
    if(is_file($core. '/configurations/buddyexpress.config.db.php')  
       || is_file($core. '/configurations/buddyexpress.config.site.php')){
                   exit('It seems the BuddyexpressDesk is already installed');
     }
}

require_once(bframework_get_approot_path().'classes/buddyexpressdesk.install.php');

bframework_register_css('css/css.php');

bframework_page_handler(array(
							  'handler' => 'index', 
							  'file' => bframework_get_approot_path().'pages/index.php'
							  ));
bframework_page_handler(array(
							  'handler' => 'settings', 
							  'file' => bframework_get_approot_path().'pages/settings.php'
							  ));
bframework_page_handler(array(
							  'handler' => 'check', 
							  'file' => bframework_get_approot_path().'pages/check.php'
							  ));

bframework_page_handler(array(
							  'handler' => 'installed', 
							  'file' => bframework_get_approot_path().'pages/installed.php'
							  ));

bframework_resgister_action('install', bframework_get_approot_path().'actions/install.php');


bframework_resgister_action('finish', bframework_get_approot_path().'actions/finish.php');

function Bdesk_url(){
  return str_replace('installation/', '', bframework_get_url());
}