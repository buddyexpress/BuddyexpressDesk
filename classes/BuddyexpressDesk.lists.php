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
 
class BDESK_LISTS {

/**
* BuddyDesk construct a BDESK_LISTS;
* @params: $listperpage = List per page;
* @params:  $fandl = first and last enable or disable;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function __construct($listperpage = 10 ,$fandl = false ,$page = 1){
    $this->page = $page; 
    $this->listper_page = $listperpage; 
    $this->first_last = $fandl; 
}
/**
* BuddyDesk Generate a list;
* @params: $array = array;
* @params: $listperpage = List per page;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/
public function generate($array, $listper_page = 10){
   if (!empty($listper_page))
        $this->perPage = $listper_page;
		      $ip = input('page');
              if(!empty($ip)) {
                   $this->page = $ip; 
                } 
	            else {
                   $this->page = 1; 
               }
       
      $this->length = count($array);
      $this->pages = ceil($this->length / $this->perPage);
      $this->start  = ceil(($this->page - 1) * $this->perPage);
	  /* BuddyDesk Generates a new List */
	  if(!is_array($array)){
		$array = array();   
	  }
	  return array_slice($array, $this->start, $this->perPage);
    }
/**
* BuddyDesk Generate page numbers;
* @last edit: $arsalanshah
* @Reason: Initial;
* 
*/     
public function pages()  {
      $plinks = array();  $links = array(); $slinks = array();
	  
	  //We must take care of BuddyDesk Page Handler
      unset($_GET['h']);
	  unset($_GET['p']);
	  if (count($_GET)) {
         $args_url = '';
          foreach ($_GET as $key => $value) {
             if ($key != 'page') {
             $args_url .= '&'.$key.'='.$value;
            }
          }
      }
       
      if (($this->pages) > 1){
                if ($this->page != 1) {
                            if ($this->first_last) {
							//WTF? we used html here?
							//@todo fix this in future release;
                             $plinks[] = ' <a class="button-nav button-nav-default" href="?page=1'.$args_url.'"><< First </a> ';
                             }
                  $plinks[] = ' <a class="button-nav button-nav-default" href="?page='.($this->page - 1).$args_url.'"><< Prev</a> ';
                 }
         
      for ($pgnums = 1; $pgnums < ($this->pages + 1); $pgnums++) {
             if ($this->page == $pgnums) {
						//WTF? we used html here?
							//@todo fix this in future release;		 
             $links[] = ' <a class="button-nav button-nav-default" >'.$pgnums.'</a> '; 
             } 
			 else {
             $links[] = ' <a class="button-nav button-nav-default" href="?page='.$pgnums.$args_url.'">'.$pgnums.'</a> ';
             }
      }
   
      if ($this->page < $this->pages) {
		  
             $slinks[] = ' <a class="button-nav button-nav-default" href="?page='.($this->page + 1).$args_url.'"> Next >> </a> ';
             if ($this->first_last) {
             $slinks[] = ' <a class="button-nav button-nav-default" href="?page='.($this->pages).$args_url.'"> Last >> </a> ';
             }
      }        
            return implode(' ', $plinks).implode('', $links).implode(' ', $slinks);
      }
      return true;
}

}