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
<!-- BuddyexpressDesk -->
<link rel="stylesheet" href="<?php echo buddyexpressdesk_site_url(); ?>templates/default/styles/style.css" type="text/css"/>
<?php echo buddyexpressdesk_fetch_views('BuddyexpressDesk/page/head'); ?>
<link rel="shortcut icon" href="<?php echo buddyexpressdesk_site_url();?>favicon.ico" />

</head>

<body>
<div style="margin:0 auto; width:1000px;">
<div class="buddyedesk-default">
<div class="buddydesk-top">        
<table border="0">
  <tr>
    <td>
       <div class="buddyexpresss-logo inline"></div>
  </td>
    <td>&nbsp;</td>
    <td>        <div class="search"> <form action="<?php echo buddyexpressdesk_site_url(); ?>search/" method="get" style="border:none;"> 
		<input type="text"  name="q"  placeholder="<?php echo buddyexpressdesk_print('search:search'); ?>" onblur="if (this.value=='') { this.value='Search' }" onfocus="if (this.value=='Search') { this.value='' };" />
		<input type="submit" value="<?php echo buddyexpressdesk_print('search:search'); ?>" class="button-blue primary" />
</form>

</div></td>
  </tr>
</table>
</div>
<?php  echo view_menu('site_topmenu'); ?>
</div>
<div>
   <?php echo $content; ?>
   
   <hr color="#CCCCCC" style="margin: 10px auto;width: 950px;" />
<div style="margin: 5px auto;width: 940px;">
         Powered <a class="besk-footer-label" href="http://labs.buddyexpress.net/bdesk.b">Buddyexpress Desk</a>
</div>
</div>

</body>
</html>