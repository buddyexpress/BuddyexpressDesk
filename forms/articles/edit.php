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
$id = input('id');
if(!empty($id)){
     $article = buddyexpressdesk_get_article(base64_decode($id));
} 
else {
   buddyexpressdesk_message(buddyexpressdesk_print("admin:article:edit:error"), 'buddyexpressdesk-message-error');
   $location = buddyexpressdesk_site_url().'administrator/article';
   header("Location: $location");
}

$form = '<input 
       type="text" 
	   name="title" 
	   placeholder="'.buddyexpressdesk_print("form:article:title").'" 
	   value="'.$article['title'].'"/>
	   <p></p>';
	   
$form .= '<textarea 
            name="article">
			 '.htmlspecialchars_decode($article['article']).'
		</textarea>';

$form .= '<input 
          type="hidden" 
		  name="id" 
		  value="'.$article['id'].'" />
          <p></p>';

$form .= '<input 
            class="buddyexpressdesk-button-submit" 
			type="submit" 
			value="'.buddyexpressdesk_print('form:save').'"

		 />';
		 
echo($form);		 