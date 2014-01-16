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
* Register a class for articles;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/ 
class BuddyexpressDesk_Article {

/**
* BuddyDesk add a new article;
* @params: $articletext  = Body for article;
* @params:  $title = title for article;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function ADD($articletext, $title){
if(!empty($title) && !empty($articletext)){
$time = date('d-m-y h:m:s A'); $owner = '1'; $article = new BDESK_DB;
$article->statement("INSERT into `bdesk_articles` (`owner_id`, `article`, `time`, `title`) 
											VALUES ('$owner', '$articletext', '$time', '$title');");
}
if($article->execute()){
  return true;	
}
 return false;
	
}
/**
* BuddyDesk Get article;
* @params: $id  = id of article;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function GET($id){
if(!empty($id)){	
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_articles WHERE (id='$id')");
	$GET->execute();
	$GET = $GET->fetch();
	return $GET;
}
 return false;
}

/**
* BuddyDesk get all article;
* @params: $id  = id of article;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public static function all(){
	$GET = new BDESK_DB;
	$GET->statement("SELECT * FROM bdesk_articles");
	$GET->execute();
	$GET = $GET->fetch(true);
	if(isset($GET)){
	return $GET;
	}
 return false;
}
/**
* BuddyDesk delete article;
* @params: $id  = id of article;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function DELETE($id){
if(!empty($id)){	
	$GET = new BDESK_DB;
	$GET->statement("DELETE FROM bdesk_articles WHERE (id='$id')");
	if($GET->execute()){
	return true;
	}
}
 return false;
}
/**
* BuddyDesk get total articles;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
public function TOTAL(){
	$GET = new BDESK_DB;
	$GET->statement("SELECT count(*) FROM bdesk_articles");
	$GET->execute();
	$GET = $GET->fetch();
	$GET = $GET["count(*)"];
	if($GET > 0){
	return $GET;	
	}
return 0;	
}

/**
* Buddydesk edit a article
* @params: $title  = title of article;
* @params: $params  = array(<article> => body, <id> => id of article)
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function EDIT($title ,$article = array()){
if(isset($article['id']) 
				  && !empty($article['article'])
				  && !empty($title)){
	
	$id = $article['id'];
	$article = $article['article'];
	$title = $title;
	$UPDATE = new BDESK_DB;
	$UPDATE->statement("UPDATE bdesk_articles SET article='$article' , title='$title' WHERE (id='$id')");
	if($UPDATE->execute()){
	   return true;	
	} 
	else {
	  return false;	
	}
	
}
return false;
}


}