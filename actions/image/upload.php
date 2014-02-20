<?PHP
$UPLOAD = new BDESK_FILE;
if($UPLOAD->UPLOAD()){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:image:uploaded'));
  $location = buddyexpressdesk_site_url().'administrator/image_upload';
  header("Location: $location");		
}