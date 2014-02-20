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

echo buddyexpressdesk_form(array(
								 'body' => buddyexpressdesk_view_form('image/upload'),
								 'attributes' => array(
													   'action' => buddyexpressdesk_site_url().'action/image/upload', 
													   'method' => 'POST',
													   'enctype' => "multipart/form-data"
													   )
								 ));
echo buddyexpressdesk_fetch_views('BuddyexpressDesk/file/upload'); 

$images = BDESK_FILE::getAll();
?>
<div class="bdesk-admin-images"> 
<table>
 <?php 
 if(isset($images)){
 foreach($images as $image){ ?>
        <tr id="<?php echo $image['id'];?>">
         <td width="61">      
          <div style="background:url('<?php echo $image['url'];?>') no-repeat;background-size:cover; height:50px;width:50px;"></div>
          </td>
          <td width="21"><div class="bdesk-admin-images-url"><input value="<?php echo $image['url'];?>" /></div></td>
          <td width="37"><a href="<?php echo buddyexpressdesk_site_url().'action/image/delete?image='.$image['id'];?>"> <div class="buddyexpressdesk-button-delete icon"></div></a></td>
                </tr>
 <?php }
 
 }
 ?>
</table>
</div>
<br/>