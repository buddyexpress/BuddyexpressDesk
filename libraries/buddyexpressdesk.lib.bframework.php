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
 
/**
* Include a bframework classes in BuddyexpressDesk Core;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
$bframework = array(
					'bframework.args.php',
					'bframework.bavatar.lib.php',
					'bframework.datetime.php',
					'bframework.forms.php',
					);

foreach($bframework as $bframework_lib){
  if(!include_once(buddyexpressdesk_route()->libs.'bframework/'.$bframework_lib)){
	 throw 
	     new exception('Can not include bframework libraries');
  }
	
}