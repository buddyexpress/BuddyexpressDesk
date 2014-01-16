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
echo '<div><div class="layout-article">';
echo '<h2>'.bframework_print('bdesk:settings').'</h2><br /> <div style="margin:0 auto; width:900px;">';
echo '<div class="bframework_msg bframework-success">'.bframework_print('bdesk:installed:message').'</div><br />';
echo '<strong>'.bframework_print('bdesk:login:details').'</strong>';
echo '<p>'.bframework_print('bdesk:login:email').'</p>';
echo '<p><p>'.bframework_print('bdesk:login:password').'</p><br />';

echo '<form action="'.bframework_get_url().'action/finish">';
echo '<input style="float:right;" type="submit" value="Finish" class="button-blue primary">';
echo '</form></div><br /><br /></div>';
