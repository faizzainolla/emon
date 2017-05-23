<?php
  define('TCONNECT_SERVER', 'https://my.telkom.co.id/connect/public/');
  define('TCONNECT_RESERVED_QUERYSTRING', 'code,error,error_message');
  
  include_once('tconnect-response.php');
  include_once('tconnect-response-error.php');
  include_once('tconnect-response-authorization.php');
  include_once('tconnect-response-token.php');
  include_once('tconnect-response-resource.php');
  include_once('tconnect-profile.php');
  include_once('tconnect-contact.php');
  include_once('tconnect-client.php');
?>