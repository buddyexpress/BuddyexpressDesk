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
  $default = new BUDDYEXPRESS_DESK_TEMPLATE; 
echo buddyexpressdesk_css(buddyexpressdesk_site_url().'templates/'.$default->getActive().'/styles/admin.css');