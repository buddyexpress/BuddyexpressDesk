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
* Ger a article by id;
* @params: $id = id or article;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function  buddyexpressdesk_get_article($id){
	$GET = new  BuddyexpressDesk_Article;
	$GET = $GET->GET($id);
	return $GET;
}
/**
* Search a article;
* @params: $q = search query;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function search($q){
  $SEARCH = new BDESK_DB;
  $SEARCH->statement("SELECT * FROM bdesk_articles WHERE article LIKE '%$q%'");
  $SEARCH->execute();
  $SEARCH = $SEARCH->fetch(true);
  if(!empty($SEARCH)){
  return $SEARCH;
  }
 return false; 
}
/**
* Get latest articles
* @params: $q = search query;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function getLatest(){
      $ARTICLES = new BDESK_DB;
	  $ARTICLES->statement('SELECT * FROM bdesk_articles ORDER BY id DESC LIMIT 2');
      $ARTICLES->execute();	
	  $GET = $ARTICLES->fetch(true);
	  if(!empty($GET)){
		return $GET;  
	  }
	return false;
}
function generateTitleLink($title){
return	htmlspecialchars(preg_replace(array('/\s+/', '/\./', '/\,/'), '-', $title));
}
function generateArticle($article){
if(!empty($article)){
     return strip_tags(htmlspecialchars_decode($article));
}
return false;
}
function generateTitle($title){
	if(!empty($title)){
		return htmlspecialchars_decode($title);
	}
return false;	
}