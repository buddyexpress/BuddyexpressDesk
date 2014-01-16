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
$com = new BUDDYEXPRESS_DESK_COM;

echo '<div class="article-lists">';

foreach($com->getList() as $coms){
            $component = $com->getCOM($coms);
                if($com->CHECK($coms)){
                  $class = 'disable';
                  $action = 'com_disable';
				  $title = 'Disable';
                 }
                 else {
                 $class = 'enable';
				 $title = 'Enable';
                 $action = 'com_enable';
                 }
				 
echo  '<div class="article">';
echo   '<h1>Name: '.$component->com_name.', Author:'.$component->com_author.', Version:'.$component->com_version.'</h1>';
echo  '<p>Description:'.$component->com_description.'</p>';
echo  '<div class="settings">';
echo  '<a href="'.buddyexpressdesk_site_url().'action/'.$action.'?com='.$coms.'" title="'.$title.'">';
echo   '<div class="buddyexpressdesk-button-'.$class.' icon"></div>';
echo  '</a></div></div>';
  
}

echo '</div>';