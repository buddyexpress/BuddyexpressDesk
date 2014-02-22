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
 
class BDESK_FILE {

public static function STORE(){
  return  buddyexpressdesk_route()->www.'uploads/';	
}
public function MAXSIZE(){
   $val =  ini_get('post_max_size');
   $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}
public static function MIME_IMAGE(){
  	$formats = array(
		'image/jpeg' => 'jpeg',
		'image/pjpeg' => 'jpeg',
		'image/png' => 'png',
		'image/x-png' => 'png',
		'image/gif' => 'gif'
	);
	return $formats;
}
public function UPLOAD(){
	$file = $_FILES['file'];
	$mimetype = $file['type'];
	$tmp = $file['tmp_name'];
	$name = $file['name'];
	$name_processed = htmlentities($name,  ENT_QUOTES, 'UTF-8');
	 
	
	if($file['size'] > $this->MAXSIZE()){
	   exit('File size exceed');
	}
	$supported = $this->MIME_IMAGE();
	if(empty($name) || empty($mimetype) || !array_key_exists($mimetype, $supported)){
	   	   exit('File is not supported');
	}
          $storename = md5($name.time().rand());
	      $this->newfile = $this->store().$storename.'.'.$supported[$mimetype];
          $upload = new BDESK_DB;
	      $upload->statement("INSERT INTO `bdesk_custom_photos` (`store`, `name`, `mime`)
									        VALUES('$storename', '$name', '$mimetype');");
	       if($upload->execute()){ 
	             move_uploaded_file($tmp, $this->newfile);
                  return true;
	   
	       }
}
public static function getAll(){
	$get = new BDESK_DB;
	$get->statement("SELECT * FROM bdesk_custom_photos");
	$get->execute();
	$imgs = $get->fetch(true);
	if(is_array($imgs)){
		foreach($imgs as $data){
		            if(!empty($data['id']) && !empty($data['mime'])){
					    $images[] = array(
										 'url' => buddyexpressdesk_site_url().'image/view/'.$data['id'].'/'.$data['name'],
										 'id' => $data['id']
										 );
					}
		}
	 return $images;	
	}

}
public static function total(){
  return count(BDESK_FILE::getAll());
}
public static function get($id){
	$get = new BDESK_DB;
	$get->statement("SELECT * FROM `bdesk_custom_photos` WHERE(id='$id');");
	$get->execute();
	return $get->fetch();
}

public function REMOVE($id){
	$delete = new BDESK_DB;
	$delete->statement("SELECT * FROM `bdesk_custom_photos` WHERE(id='$id');");
    $delete->execute();
	$meta = $delete->fetch();
	if(!empty($meta['store'])){
		$supported = $this->MIME_IMAGE();	
	    $delete->statement("DELETE FROM `bdesk_custom_photos` WHERE(id='$id');");
        if($delete->execute()){
		   $this->newfile = $this->store().$meta['store'].'.'.$supported[$meta['mime']];
	       unlink($this->newfile);
		   return true;
		}
	}
   return false;	
}

}//class
