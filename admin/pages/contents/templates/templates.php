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

$template = new BUDDYEXPRESS_DESK_TEMPLATE; 
echo '<div class="article-lists">';

foreach($template->getList() as $coms){
      $component = $template->getTEMPLATE($coms);
        
		if($template->getActive() == $coms){
           $class = 'active';
           $action = '#';
          }
         else {
            $class = 'enable';
            $action = buddyexpressdesk_site_url().'action/template_enable?template='.$coms;
          }
		  
echo '<div class="article">';
echo '<h1>Name:'.$component->name.' , Author:'.$component->author.'</h1>';
echo '<p>Description:'.$component->description.'</p>';
echo '<div class="settings">';
echo '<a href="'.$action.'">';
echo '<div class="buddyexpressdesk-button-'.$class.' icon"></div>';
echo '</a></div></div>';
       
}
echo '</div>';