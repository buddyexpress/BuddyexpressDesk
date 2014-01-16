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
<div id="buddyexpressdesk-page-menubar">
		<?php
	foreach(buddyexpressdesk_site_menu() as $key => $links){
	    if(count($links) > 1){
		     $menu_parent = '<li><a href="#">'.buddyexpressdesk_print($key).'</a><ul>';
		   foreach($links as $text => $link){
			 $menu_parent.= '<li><a href="'.$link.'">'.buddyexpressdesk_print($text).'</a></li>';
		    }
		   $menu_parent.= '</ul></li>';
		  echo $menu_parent;
		} else {

         foreach($links as $text => $link){
			 $menu = '<li><a href="'.$link.'">'.buddyexpressdesk_print($text).'</a></li>';
		   }
		   echo $menu;
		}
	}

   ?>
</div>
