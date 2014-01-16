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
								 'body' => buddyexpressdesk_view_form('account/account_settings'),
								 'attributes' => array('action' => buddyexpressdesk_site_url().'action/sitesettings', 'method' => 'POST')
								 ));