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
if(!isset($params['title'])){
	$params['title'] = '';
}
?>
<div class="layout-article">
      <style> .title { color: #666; font-size:2em; font-weight: bold;margin-bottom: 20px;} </style>
      <div class="title"> <?php echo $params['title']; ?> </div>

<?php echo $params['contents']; ?>
</div>