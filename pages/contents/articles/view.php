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
 
$article = $params['article'];
$owner = get_user_by_uid($article['owner_id']);
echo '<h2>'.$article['title'].'</h2>';
echo '<p>'.generateTitle($article['article']).'</p>';
echo '<div class="posted article-view-owner" >';
echo 'Posted by: '.$owner['name'].' '.$article['time'].'</div>';
unset($owner['password']);
echo '<br />';
echo buddyexpressdesk_fetch_views('BuddyexpressDesk/article/view', array('article' => $article, 'owner' => $owner)); 