<?php
/**
 * Buddyexpress Desk Article Share
 *
 * @package   Bdesk
 * @author    Buddyexpress Core Team <admin@buddyexpress.net
 * @copyright 2014 BUDDYEXPRESS NETWORKS.
 * @license   Buddyexpress Public License http://www.buddyexpress.net/Licences/bpl/ 
 * @link      http://labs.buddyexpress.net/bdesk.b
 */
 
$settings_coms = BUDDYEXPRESS_DESK_COM::WithSettings();
$view  = new BDESK_LISTS;
$page = $view->generate($settings_coms, 10);

echo '<div class="article-lists">';
echo '    <div class="article">';
if(empty($settings_coms)){
   echo buddyexpressdesk_print("admin:com:no");	 
}
foreach($page as $name => $data){
      echo '<h1>'.buddyexpressdesk_print("admin:com:{$name}").'</h1>';
	 echo '  <div class="settings">
               <a href="'.buddyexpressdesk_site_url().'administrator/com_settings/'.$name.'">
               <div class="buddyexpressdesk-button-settings icon"></div>
                </a></div>'; 
}

echo '</div>';
echo '</div>';
echo '<br />';
echo '<div class="button-nav button-nav-default">'.$view->pages().'</div><p></p>';
