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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="<?php echo buddyexpressdesk_site_url(); ?>templates/default/styles/login.css" type="text/css"/>
<?php echo buddyexpressdesk_fetch_views('BuddyexpressDesk/page/login/head'); ?>
<link rel="shortcut icon" href="<?php echo buddyexpressdesk_site_url();?>favicon.ico" />
</head>

<body>
   <?php echo $content; ?>
   
</body>
</html>