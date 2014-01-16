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

$articles = new BuddyexpressDesk_Article; 
$templates = new BUDDYEXPRESS_DESK_TEMPLATE;
$components = new BUDDYEXPRESS_DESK_COM;
?>
<div style="margin-left: 100px; margin-top:50px">
     <table width="790" border="0">
  <tr>
    <td width="292">        
    <div class="buddyexpressdesk_articles-count">
                       <div align="center" class="title"><?php echo $articles->TOTAL(); ?></div>
                       <p align="center"> <?php echo buddyexpressdesk_print('admin:articles'); ?> </p>
          </div>
   </td>
    <td width="292"><div class="buddyexpressdesk_articles-count">
                       <div align="center" class="title"><?php echo $components->TOTAL();?></div>
                       <p align="center"><?php echo buddyexpressdesk_print('admin:com'); ?> </p>
             </div></td>
    <td width="292">  <div class="buddyexpressdesk_articles-count">
                       <div align="center" class="title"><?php echo $templates->TOTAL();?></div>
                       <p align="center"><?php echo buddyexpressdesk_print('admin:templates'); ?> </p>
             </div></td>
  </tr>
</table>


</div>

