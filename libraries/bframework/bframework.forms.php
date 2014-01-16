<?php
/**
 * Buddyexpress Framework Core
 *
 * @package   Bframework
 * @author    Buddyexpress Core Team <admin@buddyexpress.net
 * @copyright 2012 BUDDYEXPRESS.
 * @license   Buddyexpress Public License http://www.buddyexpress.net/Licences/bpl/ 
 * @link      http://bserver.buddyexpress.net
 * @Contributors http://www.buddyexpress.net/bframework/contributors.b
 */
/*
* BFramework view form
* @uses buddyexpressdesk_view_form(array('attributes' => array(<attr>),'body' => <body>);
*/  
function buddyexpressdesk_form($params = array()){
if(isset($params['body'])){ $body = $params['body']; } else { $body = ''; }
if(isset($params['attributes'])){ $attr = $params['attributes']; } else { $attr = array(); }
$form = '<form '.bframework_args($attr).'>  <fieldset>'.$body.'</fieldset></form>';
return $form; 
}
/*
* BFramework built in core form view
* @uses buddyexpressdesk_view_core_form(form);
*/  
function buddyexpressdesk_view_form($form = '', $which = 'core', $plugin = '', $params = array()){
if(isset($form) && !empty($form)){
	if($which == 'core'){
           return buddyexpressdesk_view(buddyexpressdesk_route()->forms.$form, $params);
	} 
	elseif($which == 'com'){
		           return buddyexpressdesk_view(buddyexpressdesk_route()->com.$plugin.'/forms/'.$form);
	}
	
  }
} 
/*
* BFramework view input form
* @uses buddyexpressdesk_view_input(attr);
*/  
function buddyexpressdesk_view_input($params = ''){
if(isset($params) && is_array($params)){$input = '<input '.bframework_args($params).'/>';
return $input;
   }
}
/*
* BFramework view label
* @uses buddyexpressdesk_view_label(<attr>);
*/  
function buddyexpressdesk_view_label($params = ''){
if(isset($params) && is_array($params)){$label = '<label '.bframework_args($params['attributes']).'>'.$params['name'].'</label>';
return $label;
   }
}
/*
* BFramework view textarea
* @uses buddyexpressdesk_view_textarea(<attr>);
*/  
function buddyexpressdesk_view_textarea($params = '', $body = ''){
if(isset($params) && is_array($params)){$input = '<textarea '.bframework_args($params).'>'.$body.'</textarea>';
return $input;
   }
}