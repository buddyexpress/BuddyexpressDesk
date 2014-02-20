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
?>

        <script src="<?php echo buddyexpressdesk_site_url();?>vendors/tinymce/tinymce.min.js"></script>

        <script>
tinymce.init({
   toolbar: "bold italic underline alignleft aligncenter alignright bullist numlist image media link unlink bdesk_photo emoticons autoresize fullscreen insertdatetime print spellchecker preview",
   selector: 'textarea',
   plugins : "code image media link bdesk_photo emoticons fullscreen insertdatetime print spellchecker preview",
   convert_urls:false,
   relative_urls:false,

 
});
       </script>   
    