<?php
$view = new BDESK_LISTS;
$articles = $view->generate(BuddyexpressDesk_Article::all());
$pages = '<div class="button-nav button-nav-default">'.$view->pages().'</div>';
foreach ($articles  as $article) {
		$owner = get_user_by_uid($article['owner_id']);

$text = sttl(strip_tags(htmlspecialchars_decode($article['article'])), 500);
$title_text = sttl(strip_tags(htmlspecialchars_decode($article['title'])), 250);

?>
        <div class="buddyexpressdesk-page-articles">
      <?php $title = htmlspecialchars(preg_replace(array('/\s+/', '/\./', '/\,/'), '-', sttl($article['title'], 150, false))); ?>
      <h2> <a href="<?php echo buddyexpressdesk_site_url()?>article/view/<?php echo $article['id'];?>/<?php echo strtolower($title);?>"><?php echo $title_text; ?></a></h2>
      <p><?php echo $text;?>
       </p>
              <div class="article-view-owner-small"> Posted by: <?php echo $owner['name']; ?>  <?php echo $article['time'];?> </div>
         <br/>
      </div>
    <?php
}
echo $pages;