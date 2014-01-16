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
if(!isset($params['title'])){
	$params['title'] = '';
}
if(!isset($params['sidebar'])){
	$params['sidebar'] = '';
}
?>
<table border="0">
  <tr valign="top">
    <td>
     <div class="container articles">
      <div class="inner">
      <h1> <?php echo $params['title']; ?> </h1>
      
<?php echo $params['contents']; ?>
</div>

</div>

  </td>
    <td>   

<div class="container sidebar">
   <div style="padding:10px;">
       <?php echo buddyexpressdesk_fetch_views('buddyexpressdesk/page/sidebar'); ?>
     </div>
</div>
</td>
  </tr>
</table>

