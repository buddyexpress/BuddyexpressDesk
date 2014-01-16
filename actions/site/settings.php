<?php

$email = input('email');
$newemail = input('newemail');
$password = input('oldpwd');
$newpassword = input('newpwd');

if(save_settings_account($email, $newemail, $password, $newpassword)){
   buddyexpressdesk_message(buddyexpressdesk_print('admin:settings:changed'), 'buddyexpressdesk-message-system');
   $location = buddyexpressdesk_site_url().'administrator/account';
   header("Location: $location");	
   exit;
   }
else {
   buddyexpressdesk_message(buddyexpressdesk_print('admin:settings:error'), 'buddyexpressdesk-message-error');
   $location = buddyexpressdesk_site_url().'administrator/account';
   header("Location: $location");	
   exit;
}