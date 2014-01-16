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

$q = input('q');
echo "<h2>".buddyexpressdesk_print('search:result').": ".$q."</h2>";
$search = search($q);
if($search){
$pagination = new BDESK_LISTS;
$articless = $pagination->generate($search, 4);
if (count($articless ) != 0) {
	if($pagination->pages() == 1 ){
    $pages = '<div class="button-nav button-nav-default">'.$pagination->pages().'</div>';
	} 
	else {
	$pages = $pagination->pages();

	}
foreach ($articless  as $article) {
	$owner = get_user_by_uid($article['owner_id']);

	$art = sttl(strip_tags(htmlspecialchars_decode($article['article'])), 500);

?>
        <div class="buddyexpressdesk-page-articles">
      <?php $title = htmlspecialchars(preg_replace(array('/\s+/', '/\./', '/\,/'), '-', $article['title'])); ?>
      <h2> <a href="<?php echo buddyexpressdesk_site_url()?>article/view/<?php echo $article['id'];?>/<?php echo $title;?>"><?php echo preg_replace('/'.$q.'/i','<span style="background-color:#FFFF00;">'.$q.'</span>', $article['title']);?></a></h2>
      <p><?php echo preg_replace('/'.$q.'/i', '<span style="background-color:#FFFF00;">'.$q.'</span>', $art);?>
       </p>
              <span style="font-size: 10.5px;"> Posted by: <?php echo $owner['name']; ?> <?php echo $article['time'];?> </span>

      </div>
    <?php
}
         echo $pages;

}

} else {
	
echo 'No result found';	
}

?>