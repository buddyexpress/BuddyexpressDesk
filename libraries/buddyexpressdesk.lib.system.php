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
* Get input from user; using secure method;
* @params: $input = name of input;
* @params:  $validate = if you don't want to encode to html entities then add 1 as second arg in function; 
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function input($input, $validate = ''){	
$replacements = array( "\x00" => '\x00',"\n" => '\n',"\r" => '\r',"\\" => '\\\\',"'" => "\'",'"' => '\"',"\x1a" => '\x1a');
if(isset($_REQUEST[$input]) && empty($validate)){
  	 $data = htmlentities($_REQUEST[$input],  ENT_QUOTES, 'UTF-8');
  return strtr($data , $replacements);
 } elseif($validate == 1){
    return strtr($input , $replacements);
 }
return false; 
}
/**
* Manage a session messages;
* @params: $message = Message;
* @params:  $register = class for error; 
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function buddyexpressdesk_message($message = null, $register = "buddyexpressdesk-message-success", $count = false) {
	if (!isset($_SESSION['bdesk_messages'])) {
		$_SESSION['bdesk_messages'] = array();
	}
	if (!isset($_SESSION['bdesk_messages'][$register]) && !empty($register)) {
		$_SESSION['bdesk_messages'][$register][time()] = array();
	}
	if (!$count) {
		if (!empty($message) && is_array($message)) {
			$_SESSION['bdesk_messages'][$register][time()] = array_merge($_SESSION['bdesk_messages'][$register], $message);
			return true;
		} else if (!empty($message) && is_string($message)) {
			$_SESSION['bdesk_messages'][$register][time()][] = $message;
			return true;
		} else if (is_null($message)) {
			if ($register != "") {
				$returnarray = array();
				$returnarray[$register] = $_SESSION['bdesk_messages'][$register][time()];
				$_SESSION['bdesk_messages'][$register][time()] = array();
			} else {
				$returnarray = $_SESSION['bdesk_messages'];
				$_SESSION['bdesk_messages'] = array();
			}
			return $returnarray;
		}
	} else {
		if (!empty($register)) {
			return sizeof($_SESSION['bdesk_messages'][$register][time()]);
		} else {
			$count = 0;
			foreach ($_SESSION['bdesk_messages'] as $submessages) {
				$count += sizeof($submessages);
			}
			return $count;
		}
	}
	return false;       
}
/**
* Display messages;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function display_error_messages(){
if(isset($_SESSION['bdesk_messages'])){
             $dermessage = $_SESSION['bdesk_messages'];
             if(!empty($dermessage)){

                 if (isset($dermessage) && is_array($dermessage) && sizeof($dermessage) > 0) {
	                        foreach ($dermessage as $type => $list ) {
		                             foreach ($list as $messages) {
		                                       foreach ($messages as $message) {
			                                           $m = "<div class='$type'>";
			                                           $m .= $message;
			                                           $m .= '</div>';
													   $ms[] = $m;
                                                       unset($_SESSION['bdesk_messages'][$type]);
                                                 }
		                              }
	                         }
                }
       
        }

   } 
   if(isset($ms) && is_array($ms)){
   return implode('',$ms);
   }
}
/**
* Limit a words in a string
* @params $str = string;
* @params $limit = words limit;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
function sttl($str, $limit = NULL, $dots = true){
if(isset($str) 
		 && isset($limit)){
   if(strlen($str) > $limit){
	   if($dots == true){
    return substr($str, 0, $limit).'...';		
	   } elseif($dots == false){
		   return substr($str, 0, $limit);
	   }
   }
   elseif(strlen($str) < $limit){
	return $str;   	   
   }
}
  return false; 
}

function articles_lists($params = array()){
	$DB = new BDESK_DB;
	$articles = $DB->CONNECT();
    $result = $articles->query("SELECT COUNT(*) FROM bdesk_articles");
    $r = $result->fetch_row();

    $numrows = $r[0];

    if(empty($params['offset'])){
    $rpp = 10;  //dataper page
    } 
    else {
    $rpp = $params['offset'];
    }

    $rowsperpage = $rpp;
    $totalpages = ceil($numrows / $rowsperpage);

    $ofset = input('offset');
    if (isset($ofset) && is_numeric($ofset)) {
              $currentpage = (int)input('offset');
    }
    else {
       $currentpage = 1;
    }
	
    if ($currentpage > $totalpages) {
       $currentpage = $totalpages;
    }
	
	  
    if ($currentpage < 1) {
       $currentpage = 1;
    }
	 
    $offset = ($currentpage - 1) * $rowsperpage;

    $articles_combine = "SELECT * FROM bdesk_articles LIMIT $offset, $rowsperpage";
    $result = $articles->query($articles_combine);

  
   while ($list = $result->fetch_assoc()) {
   $results[] = '
    <div class="article">
               <h1>'.sttl($list['title'], 120).' </h1>
               <p> '.sttl(strip_tags(htmlspecialchars_decode($list['article'])), 140).' </p>
               <div class="settings">
               <a href="'.buddyexpressdesk_site_url().'action/adelete?id='.base64_encode($list['id']).'">
               <div class="buddyexpressdesk-button-delete icon"></div>
                </a>
               <a href="'.buddyexpressdesk_site_url().'administrator/article/edit?id='.base64_encode($list['id']).'">
               <div class="buddyexpressdesk-button-edit icon"></div>
               </a>
               </div>
    </div>';
   }
   if(!isset($results)){
	   $results  = array();
   }
   $results[] .= '<br />';
   
   $range = 3;
   $elements = '';
   
   if ($currentpage > 1) {
      $elements .= " <a class='button-nav button-nav-default' href='{$params['pageurl']}?offset=1'>First Page</a> ";
      $prevpage = $currentpage - 1;
      $elements .= " <a  class='button-nav button-nav-default' href='{$params['pageurl']}?offset=$prevpage'>Previous Page</a> ";
   } 

for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
     if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $currentpage) {
           $cpages[] = "<span class='button-nav button-nav-default'>$x</span> ";
           } else {
           $cpages[] = " <a class='button-nav button-nav-default' href='{$params['pageurl']}?offset=$x'>$x</a> ";
        } 
     } 
}  
   if(!isset($cpages)){
	  $cpages = array('No articles', '<br /><br />');
   }
   $elements .= '<span>'.implode('',$cpages).'</span>';
   if ($currentpage != $totalpages) {
      $nextpage = $currentpage + 1;
      $elements .= " <a class='button-nav button-nav-default' href='{$params['pageurl']}?offset=$nextpage'>Next</a> ";
      $elements .= " <a class='button-nav button-nav-default' href='{$params['pageurl']}?offset=$totalpages'>Last</a> ";
    } 
    
    if(!empty($results)){
	$rslt = $results;
	}
    return implode('',$rslt).$elements;
	
}
/**
* Get a website settings;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
function buddyexpressdesk_settings(){
    $settings = new stdClass;
	$GET = new BDESK_DB;
    $GET->statement('SELECT * FROM bdesk_site LIMIT 1');
    $GET->execute();
	$defaults = $GET->fetch();
	foreach ($defaults as $name => $value) {
		if (empty($paths->$name)) {
			$settings->$name = $value;
		}
	}
	return $settings;
}
/**
* Register a 404 page for website;
*
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/	
function page_404(){
$content = array(
				 'contents' =>  buddyexpressdesk_print('page:notfound:msg'),
				 'title' => buddyexpressdesk_print('page:notfound:code'),
			);
return buddyexpressdesk_view_page(buddyexpressdesk_print('site:home'), buddyexpressdesk_layout_view('page_article', $content));
}