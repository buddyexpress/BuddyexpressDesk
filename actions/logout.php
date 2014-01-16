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
    logout();
    buddyexpressdesk_message(buddyexpressdesk_print('site:logout'));
    $location = buddyexpressdesk_site_url().'administrator/login';
    header("Location: $location");		
