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

$form = '<input 
            type="text" 
			name="title" 
	        placeholder="'.buddyexpressdesk_print("form:article:title").'" 
			/>
		<p></p>';
$form .= '<textarea name="article"></textarea><p></p>';

$form .= '<input 
         class="buddyexpressdesk-button-submit" 
		 type="submit" 
		 value="'.buddyexpressdesk_print('form:save').'"
		 />';
          
echo($form);		  