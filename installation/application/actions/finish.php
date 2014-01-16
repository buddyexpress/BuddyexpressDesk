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
  
  file_put_contents(bframework_get_approot_path().'INSTALLED', 1);
  $installed = str_replace('installation/', '', bframework_get_url()).'administrator';
  header("Location: {$installed}");
  