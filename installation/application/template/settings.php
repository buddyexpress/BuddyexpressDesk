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
 
echo '<div><div class="layout-article">';
echo '<h2>'.bframework_print('bdesk:settings').'</h2><br />';

echo '<form action="'.bframework_get_url().'action/install" method="post"><table width="745" border="0"><tr>';
echo '<td width="172"><strong>'.bframework_print('bdesk:dbuser').':</strong></td>';
echo  '<td width="10">&nbsp;</td><td width="549"><input type="text" name="dbuser" /></td></tr><tr>';
echo  '<td><strong>'.bframework_print('bdesk:password') .':</strong></td>';
echo  '<td>&nbsp;</td><td><input type="text" name="dbpwd" /></td></tr><tr><td><strong>'.bframework_print('bdesk:dbname').':</strong></td>';
echo  '<td>&nbsp;</td>';
echo  '<td><input type="text" name="dbname" /></td>';
echo  '</tr><tr><td><strong>'.bframework_print('bdesk:dbhost').':</strong></td><td>&nbsp;</td> <td><input type="text" name="dbhost" /></td></tr><tr>';
echo   '<td><strong>'.bframework_print('bdesk:weburl').':</strong></td>';
echo   '<td>&nbsp;</td><td><input type="text" name="url" value="'.BUDDYDESK_INSTALL::url().'" /></td></tr>';
  
echo  '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Install" class="button-blue primary"></td>';
echo  '</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table></form></div>';

