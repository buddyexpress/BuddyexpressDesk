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
 
echo '<select name="lang">';
foreach(buddyexpressdesk_locales()as $lang){
		echo "<option value='$lang'>".buddyexpressdesk_print($lang)."</option>";
}

echo '<input 
       class="buddyexpressdesk-button-submit" 
	   type="submit" 
	   value="'.buddyexpressdesk_print('form:save').'">';
	   
echo '</select>';
