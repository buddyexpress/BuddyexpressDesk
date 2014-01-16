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
$INSTALL = new BUDDYDESK_INSTALL;
$INSTALL->dbusername($_POST['dbuser']);
$INSTALL->dbpassword($_POST['dbpwd']);
$INSTALL->dbhost($_POST['dbhost']);
$INSTALL->dbname($_POST['dbname']);
$INSTALL->weburl($_POST['url']);
if($INSTALL->INSTALL()){
  $installed = bframework_get_url().'installed';
  header("Location: {$installed}");
}
