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
<div class="buddyexpressdesk-topmenu"> 
      <div class="inner">
        <?php 	foreach(buddyexpressdesk_admin_menu() as $key => $links){
                  		   foreach($links as $text => $link){
						   echo '<li class="link"><a href="'.$link.'">'.buddyexpressdesk_print($text).'</a></li>';
						   }
			    }
 
          ?>
      </div>