<?PHP
$image = input('image');
$REMOVE = new BDESK_FILE;
if($REMOVE->REMOVE($image)){
  buddyexpressdesk_message(buddyexpressdesk_print('admin:image:deleted'));
  $location = buddyexpressdesk_site_url().'administrator/image_upload';
  header("Location: $location");
 } 
else {
  buddyexpressdesk_message(buddyexpressdesk_print('admin:image:delete:error'), 'buddyexpressdesk-message-error');
  $location = buddyexpressdesk_site_url().'administrator/image_upload';
  header("Location: $location");
}