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
* Include css in pages;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
function buddyexpressdesk_css($path){
if(isset($path) && !empty($path)){
    $style ='
	<link rel="stylesheet" href="'.$path.'" type="text/css"/>';
	return $style;
  }
	
}

function buddyexpressdesk_js($path) {
if(isset($path) && !empty($path)){
    $style ='
	<script type="text/javascript" src="'.$path.'"></script>';
	return $style;
  }
}