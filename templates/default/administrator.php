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
<?php echo buddyexpressdesk_fetch_views('BuddyexpressDesk/page/admin/head'); ?>
<link rel="shortcut icon" href="<?php echo buddyexpressdesk_site_url();?>favicon.ico" />
</head>

<body>
<div class="buddyexpressdesk-topbar">
        <div class="inner">
                  <div class="buddyexpress-desk-logo"></div>
                  <div class="links">Hello Administrator,<br />
                   <a href="<?php echo buddyexpressdesk_site_url();?>">  <?php echo buddyexpressdesk_print('admin:top:view:site'); ?> </a>| <a href="<?php echo buddyexpressdesk_site_url();?>action/logout"> <?php echo buddyexpressdesk_print('logout'); ?></a>
                     </div>
        </div>
</div>
<?php  echo view_menu('admin_topmenu'); ?>

 
</div>
<div class="buddyexpressdesk-container">
  
                     <?php echo display_error_messages(); ?>
                    
          <div class="buddyexpressdesk-title"> 
          <h1> <?php echo $title; ?></h1>
          </div>
          <div class="buddyexpressdesk-newarticle">
   <?php echo $content; ?>
   
             </div>


</div> 
<div class="footer">
POWERED BDESK V<?php echo BUDDYEXPRESS_DESK_COM::BuddyDesk_Version(); ?>,  <a href="http://labs.buddyexpress.net">BUDDYEXPRESS NETWORK</a> 2009-2014.
</div>            
</body>

</html>