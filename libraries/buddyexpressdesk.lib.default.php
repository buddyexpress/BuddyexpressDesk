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
* Register a page handler for index page;
* @pages: 
       index
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/  
function buddyexpressdesk_index_pagehandler($index){
    $page = $index[0];
    // if no sub page found then call homepage
	if(empty($page)){$page = 'home';}
	switch($page){		
    case 'home':
     echo buddyexpressdesk_view(buddyexpressdesk_route()->pages.'index');
    break;
	
	default:
    	echo  page_404();
    break;

	}
}
/**
* Register a page handler for admin login;
* @pages: 
       login
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/  
function buddyexpressdesk_adminlogin_pagehandler($login){
	 $page = $login[0];
	//default page;
    if(empty($page)){$page = 'login';}
	switch($page){
	case 'login':
	    echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/login');
	break;
	
	default:
        echo  page_404();
    break;

	}
}
/**
* Register a page handler for administrator;
* @pages: 
*       administrator, 
*   	administrator/home, 
*       administrator/article,
*       administrator/article/add,
*       administrator/article/edit,
*       administrator/components,
*       administrator/templates
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/  
function buddyexpressdesk_admin_pagehandler($index){
    $page = $index[0];
	//default page;
    if(empty($page)){$page = 'home';}
	switch($page){		
    case 'home':
     echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/index');
    break;
	
	case 'article':
      if(isset($index[1]) && $index[1] == 'add'){
	      echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/articles/add');
	  }
	  if(isset($index[1]) && $index[1] == 'edit'){
	      echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/articles/edit');
	  }
	 if(!isset($index[1]) || empty($index[1])){ 
        echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/articles/articles');
	 }
    break;
	
	case 'components':
	        echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/components/components');
    break;
	
	case 'templates':
	    echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/templates/templates');
	break;
	
	case 'account':
	    echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/site/account');
	break;
	
	case 'settings':
	    echo buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/site/settings');
	break;
	
	case 'com_settings':
	   global $BuddyexpressDesk;

       if(isset($index[1]) 
					   && isset($BuddyexpressDesk->settings) 
					   && array_key_exists($index[1], $BuddyexpressDesk->settings)){
		$title = buddyexpressdesk_print("admin:com:settings:{$index[1]}");
		$contents = BUDDYEXPRESS_DESK_COM::getForm($BuddyexpressDesk->settings[$index[1]]);
		$content = array(
				 'contents' => $contents
		 );
		$layout = buddyexpressdesk_layout_view('article', $content);
        echo buddyexpressdesk_view_page($title, $layout,'administrator');
		
	   } 
	   else {
		$title = buddyexpressdesk_print('admin:com:config');
		$contents = buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/contents/components/components_settings');
        $content = array(
				 'contents' =>  $contents
			);
		$layout = buddyexpressdesk_layout_view('article', $content);
        echo buddyexpressdesk_view_page($title, $layout,'administrator');   
	   }
	break;
	
	case 'image_upload':

   		$title = buddyexpressdesk_print('admin:image:upload');
		$contents = buddyexpressdesk_view(buddyexpressdesk_route()->admin.'pages/contents/image/upload');
        $content = array(
				 'contents' =>  $contents
			);
		$layout = buddyexpressdesk_layout_view('article', $content);
        echo buddyexpressdesk_view_page($title, $layout,'administrator');   
	break;
	
	default:
      echo  page_404();
    break;

	}
}

function buddyexpressdesk_image_pagehandler($image){
	$page = $image[0];
	switch($page){		
        case 'view':
             if(isset($image[1]) 
					  && !empty($image[1]) 
					  && is_numeric($image[1])){
	            $data = BDESK_FILE::get($image[1]);	
	            if(!empty($data['id']) && !empty($data['mime']) && $data['name'] == $image[2]){
                      header("Content-Type: {$data['mime']}"); 
					  $file = BDESK_FILE::STORE();
					  $memie = BDESK_FILE::MIME_IMAGE();
					  echo file_get_contents($file.$data['store'].'.'.$memie[$data['mime']]);
	            }
	            else {
    	           echo  page_404();
	             }
	          }
    break;

	default:
    	echo  page_404();
    break;

	}
	
}
/**
* Register a page handler for article;
* @pages: 
*       article/view
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_article_pagehandler($article){
	$page = $article[0];
    if(empty($page)){
	   $page_index = buddyexpressdesk_site_url();
	   header("Location: $page_index");
	}
	switch($page){		
        case 'view':
             if(isset($article[1]) 
					  && !empty($article[1]) 
					  && is_numeric($article[1])){
	            $data = buddyexpressdesk_get_article($article[1]);	
	            if(!empty($data['id'])){
                echo buddyexpressdesk_view(buddyexpressdesk_route()->pages.'articles/view', array('article' => $data));
	            }
	            else {
    	           echo  page_404();
	             }
	          }
    break;
	     case 'all':
         echo buddyexpressdesk_view(buddyexpressdesk_route()->pages.'articles/all');
    break;
	
	default:
    	echo  page_404();
    break;

	}
}
function init_jquery($context, $params = false, $url){
	 $baseurl = buddyexpressdesk_site_url();
	 $init = buddyexpressdesk_js($baseurl.'vendors/jquery/jquery-1.6.4.min.js');
     return $init;
}
function js_buddyexpressdesk($context, $params = false, $url){
      $baseurl = buddyexpressdesk_site_url();
      return buddyexpressdesk_js($baseurl.'javascript/buddyexpressdesk.js');
}
/**
* Register a actions for forms;
* @actions: 
*       login, logout, article add, article edit, component enable/disable, template enable/disable
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
buddyexpressdesk_register_action('login', buddyexpressdesk_route()->actions.'login.php');
if(admin_loggedin()){
buddyexpressdesk_register_action('logout', buddyexpressdesk_route()->actions.'logout.php');
buddyexpressdesk_register_action('articleadd', buddyexpressdesk_route()->actions.'articles/add.php');
buddyexpressdesk_register_action('aedit', buddyexpressdesk_route()->actions.'articles/edit.php');
buddyexpressdesk_register_action('adelete', buddyexpressdesk_route()->actions.'articles/delete.php');
buddyexpressdesk_register_action('com_enable', buddyexpressdesk_route()->actions.'components/enable.php');
buddyexpressdesk_register_action('com_disable', buddyexpressdesk_route()->actions.'components/disable.php');
buddyexpressdesk_register_action('template_enable', buddyexpressdesk_route()->actions.'templates/enable.php');
buddyexpressdesk_register_action('sitesettings', buddyexpressdesk_route()->actions.'site/settings.php');
buddyexpressdesk_register_action('setlang', buddyexpressdesk_route()->actions.'site/setlang.php');
buddyexpressdesk_register_action('image/upload', buddyexpressdesk_route()->actions.'image/upload.php');
buddyexpressdesk_register_action('image/delete', buddyexpressdesk_route()->actions.'image/delete.php');

}

/**
* Register a page handlers;
* @pages, 
*       index, article, administrator
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
buddyexpressdesk_register_page('index', 'buddyexpressdesk_index_pagehandler');
buddyexpressdesk_register_page('article', 'buddyexpressdesk_article_pagehandler');
buddyexpressdesk_register_page('image', 'buddyexpressdesk_image_pagehandler');
if(admin_loggedin()){
     buddyexpressdesk_register_page('administrator', 'buddyexpressdesk_admin_pagehandler');
}
elseif(!admin_loggedin()){
     buddyexpressdesk_register_page('administrator', 'buddyexpressdesk_adminlogin_pagehandler');	
}
/**
* Register a default menu items;
* @items, 
*       home, articles
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
buddyexpress_register_menu_link('index', 'admin:home', buddyexpressdesk_site_url());
buddyexpress_register_menu_link('articles', 'admin:articles', buddyexpressdesk_site_url().'article/all');

buddyexpress_register_menu_link('home', 'admin:home', buddyexpressdesk_site_url().'administrator', 'admin');
buddyexpress_register_menu_link('articles', 'admin:articles', buddyexpressdesk_site_url().'administrator/article', 'admin');
buddyexpress_register_menu_link('addarticle', 'admin:add:article', buddyexpressdesk_site_url().'administrator/article/add', 'admin');
buddyexpress_register_menu_link('com', 'admin:com', buddyexpressdesk_site_url().'administrator/components', 'admin');
buddyexpress_register_menu_link('template', 'admin:templates', buddyexpressdesk_site_url().'administrator/templates', 'admin');
buddyexpress_register_menu_link('site_account', 'admin:account', buddyexpressdesk_site_url().'administrator/account', 'admin');
buddyexpress_register_menu_link('settings', 'admin:settings', buddyexpressdesk_site_url().'administrator/settings', 'admin');
buddyexpress_register_menu_link('com_settings', 'admin:com:settings', buddyexpressdesk_site_url().'administrator/com_settings', 'admin');
buddyexpress_register_menu_link('custom:image', 'admin:image:upload', buddyexpressdesk_site_url().'administrator/image_upload', 'admin');


buddyexpressdesk_register_language('en', buddyexpressdesk_route()->locale.'buddyexpressdesk.en.php');
buddyexpressdesk_register_language('de', buddyexpressdesk_route()->locale.'buddyexpressdesk.de.php');


buddyexpressdesk_register_view('BuddyexpressDesk/page/admin/head', 'init_jquery');
buddyexpressdesk_register_view('BuddyexpressDesk/page/admin/head', 'js_buddyexpressdesk');