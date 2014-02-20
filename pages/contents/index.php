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
if(getLatest()){      
foreach(getLatest() as $article){
$title = generateTitleLink($article['title']); 
$owner = get_user_by_uid($article['owner_id']);

echo    '<div class="buddyexpressdesk-page-articles">';
echo '<h2><a href="'.buddyexpressdesk_site_url().'article/view/'.$article['id'].'/'.$title.'">'.$article['title'].'</a></h2>';
echo  '<p>'.sttl(generateArticle($article['article']), 500).'</p>';
echo '<div class="article-view-owner-small"> Posted by: '.$owner['name'].' '.$article['time'].'</div><br/></div>';

	}
}
