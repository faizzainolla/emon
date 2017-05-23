<?php
/* define client id & secret */
define('CLIENT_ID', 92);
define('CLIENT_SECRET', '92cc227532d17e56e07902b254dfad10');
define('CLIENT_REDIRECT_URL', 'http://localhost/connecttest');

define('TOKEN', 'local_token');
define('TOKEN_ACCESS', 'local_access_token');
define('TOKEN_REFRESH', 'local_refresh_token');

/* init session */
session_start();
//session_destroy();

/* include PHP lib */
include_once('lib/tconnect.php');

/* create new client */
$client = new TConnect_Client();
$client->setClient(CLIENT_ID);
$client->setSecret(CLIENT_SECRET);

/* global vars */
$token = null;
$error = null;
$resource = null; //yang akan diisi data2 query profile
$login = true;

/* handle oauth2 response */
if ($response = $client->handleResponse()) {
  
  $type = get_class($response);
  
  /* response is auth code? */
  if ($type == 'TConnect_Response_Authorization') {
  
    /* reload access & refresh token if any */
    $access = null;
    $refresh = null;
    if (isset($_SESSION[TOKEN_ACCESS]) && isset($_SESSION[TOKEN_REFRESH])) {
      $access = $_SESSION[TOKEN_ACCESS];
      $refresh = $_SESSION[TOKEN_REFRESH];
    }
    
    /* any access & refresh tokens? */
    if ($access && $refresh) {
      
      $response = new TConnect_Response_Token($access, $refresh);
      $type = get_class($response);
      
    } else {
    
      /* store code */
      $code = $response->getAuthorizationCode();
      
      /* no token? get it remotely */
      $response = $client->getToken($code);
      $type = get_class($response);

      /* store token to session */
      if ($type == 'TConnect_Response_Token') {
      
        $_SESSION[TOKEN_ACCESS] = $response->getAccessToken();
        $_SESSION[TOKEN_REFRESH] = $response->getRefreshToken();
      
      }
      
    }
    
  }
  
  /* response is token */
  if ($type == 'TConnect_Response_Token') {
  
    /* store token to session */
    $token = $response->getAccessToken();
    $_SESSION[TOKEN] = $token;

    /* attempt to get resource */
    $response = $client->getResource($token);
    if (get_class($response) == 'TConnect_Response_Resource') {
      $resource = $response;
    } else {
      $error = $response;
    }
  
  }
  
  /* response is error */
  if ($type == 'TConnect_Response_Error') {
  
    /* store error for display */
    $error = $response;
    
  }
  
} /* end handle response */
  
/* login button */
//var_dump($resource);
?>
<html>
<head>
  <title>T-Connect Sample</title>
</head>
<body>

  <iframe id="wptc-session" src="<?php echo($client->getSessionURL()); ?>" width="100%" height="32" style="display: none;"></iframe>

  <!-- display error if any -->
  <?php if ($error != null) { ?>
  <div id="wptc-error">
    <?php echo('Error: ' . $error->getDescription()); ?>
  </div>
  <?php } ?>

  <!-- display resource if any -->
  <?php if ($resource != null) { ?>
  <?php $profile = $resource->getProfile(); ?>
  <?php $contact = $resource->getContact(); ?>
  <?php if ($resource->isPartial()) { //partial not logged in ?>
  <p>Hello <?php echo($profile->getName()); ?>, click the button below to login and use full Telkom Connect feature!</p>
  <?php } else { //logged in ?>
  <?php $login = false; ?>
  <p>Hello <?php echo($profile->getName()); ?>, you're now logged in using Telkom Connect!</p>
  <?php } //end login check ?>
  <!-- display resource obtained -->
  <div id="wptc-id" style="display: block;">Telkom Id: <?php echo($profile->getId()); ?></div>
  <div id="wptc-name" style="display: block;">Nama: <?php echo($profile->getName()); ?></div>
  <div id="wptc-city" style="display: block;">Kota: <?php echo($profile->getCity()); ?></div>
  <div id="wptc-mail" style="display: block;">Mail: <?php echo($contact->getEMail()); ?></div>
  <div id="wptc-phone" style="display: block;">Phone: <?php echo($contact->getPhone()); ?></div>
  <div id="wptc-flexi" style="display: block;">Flexi: <?php echo($contact->getFlexi()); ?></div>
  <br />
  <?php } //end resource check ?>
  
  <!-- display login/logout form if any -->
  <?php if ($login) { ?>
  <form name="wptc-login" method="get" action="<?php echo($client->getServerURL()); ?>">
    <?php echo($client->getRequestVariables()); ?>
    <input type="submit" id="wptc-connect-button" value="Login with Telkom Connect" />
  </form>
  <?php } else { ?>
  <form name="wptc-logout" method="get" action="<?php echo($client->getLogoutURL()); ?>">
    <input type="hidden" name="u" value="<?php echo($client->getCurrentURL()); ?>" />
    <input type="submit" id="wptc-logout-button" value="Logout" />
  </form>
  <?php } //logout ?>
  
</body>