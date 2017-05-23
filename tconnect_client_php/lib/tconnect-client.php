<?php
class TConnect_Client {

  const PARAM_CLIENT = 'v';
  const PARAM_SECRET = 'e';
  const PARAM_SCOPE = 'n';
  const PARAM_URL = 'u';
  const PARAM_CODE = 's';
  
  protected $_clientid;
  protected $_secret;

  function __construct($clientid = null, $secret = null, $serverurl = null) {
  
  }
  
  private function __request($url, $data = array(), $post = true) {
  
    $result = '';
  
    if ($ch = curl_init()) {

      $url = str_replace('http://', 'https://', $url);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 120);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      if (count($data) > 0) {
      
        $query = '';
        foreach ($data as $key => $value) {
          if ($query == '') {
            $query .= $key . '=' . rawurlencode($value);
          } else {
            $query .= '&' . $key . '=' . rawurlencode($value);
          }
        }
      
        if ($post) {
          curl_setopt($ch, CURLOPT_POST, count($data));
          curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        } else {
          curl_setopt($ch, CURLOPT_URL, $url . '?' . $query);
        }
        
      }
      
      $result = curl_exec($ch);
      //var_dump($result);
      
      curl_close($ch);
    }
    return $result;
  }
  
  public function setClient($id) {
    
    $this->_clientid = $id;
  }
  
  public function setSecret($secret) {
  
    $this->_secret = $secret;
  }
  
  public function getServerURL() {
  
    return TCONNECT_SERVER;
  }
  
  public function getSessionURL() {
  
    return TCONNECT_SERVER . 'session';
  }
  
  public function getLogoutURL() {
  
    return TCONNECT_SERVER . '../../logout.php';
  }
  
  public function getCurrentURL() {

    /* get protocol */
    $protocol = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $offset = strpos($protocol, '/');
    if ($offset !== false) { $protocol = substr($protocol, 0, $offset); }
    /* is secure? */
    $secure = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    /* append s to protocol */
    $protocol .= $secure;
    /* port */
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
    /* full uri */
    $uri = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
    
    /* remove querystring portion */
    $offset = strrpos($uri, '?');
    if ($offset !== false) {
      $url = substr($uri, 0, $offset);
    } else {
      $url = $uri;
    }
    
    /* parse get requests and remove tconnect vars */
    $query = '';
    if (isset($_GET)) {
      $reserved = explode(',', TCONNECT_RESERVED_QUERYSTRING);
      foreach ($_GET as $key => $value) {
        if (!in_array(strtolower($key), $reserved)) {
          $value = rawurldecode($value);
          if ($query == '') {
            $query .= $key . '=' . rawurlencode($value);
          } else {
            $query .= '&' . $key . '=' . rawurlencode($value);
          }
        }
      }
    }
    
    /* append querystring */
    if ($query != '') { $url .= '?' . $query; }
    
    return $url;
  }
  
  public function getDefaultScope() {
  
    return 'profile contact';
  }
  
  public function getRequestVariables($scope = null, $redirect_url = null, $input = true) {
  
    if ($scope == null) { $scope = $this->getDefaultScope(); }
    if ($redirect_url == null) { $redirect_url = $this->getCurrentURL(); }

    $result = '';
    if ($input) {
      $result = '<input type="hidden" name="' . self::PARAM_CLIENT . '" value="' . rawurlencode($this->_clientid) . '" />' .
                '<input type="hidden" name="' . self::PARAM_SECRET . '" value="' . rawurlencode($this->_secret) . '" />' .
                '<input type="hidden" name="' . self::PARAM_SCOPE . '" value="' . rawurlencode($scope) . '" />' .
                '<input type="hidden" name="' . self::PARAM_URL . '" value="' . rawurlencode($redirect_url) . '" />' .
                '<input type="hidden" name="' . self::PARAM_CODE . '" value="' . rand(1, 1000) . '" />';
    } else {
      $result = self::PARAM_CLIENT . '=' . rawurlencode($this->_clientid) .
                '&' . self::PARAM_SECRET . '=' . rawurlencode($this->_secret) .
                '&' . self::PARAM_SCOPE . '=' . rawurlencode($scope) .
                '&' . self::PARAM_URL . '=' . rawurlencode($redirect_url) .
                '&' . self::PARAM_CODE . '=' . rand(1, 1000);
    }
    
    return $result;
  }
  
  public function getToken($authorization_code, $scope = null, $redirect_url = null) {

    if ($scope == null) { $scope = $this->getDefaultScope(); }
    if ($redirect_url == null) { $redirect_url = $this->getCurrentURL(); }
  
    /* exchange auth code as token */
    $text = $this->__request(TCONNECT_SERVER . 'token/', array(
              self::PARAM_CLIENT => rawurlencode($this->_clientid),
              self::PARAM_SECRET => rawurlencode($this->_secret),
              self::PARAM_SCOPE => rawurlencode($scope),
              self::PARAM_URL => rawurlencode($redirect_url),
              self::PARAM_CODE => rawurlencode($authorization_code)
            ));
    
    if (strlen($text) > 0) {
    
      /* decode data */
      $data = @json_decode($text, true);
      
      /* token? */
      if ($data['type'] == 'token') {
        $response = new TConnect_Response_Token($data['token']['access'], $data['token']['refresh'], $data['token']['scope'], $data['token']['expire']);
      } elseif ($data['type'] == 'error') {
        $response = new TConnect_Response_Error($data['code'], $data['error']['code'], $data['error']['message']);
      }
    
    } else {
      $response = new TConnect_Response_Error(403, 'no_token', 'Token exchange failed!');
    }
    
    return $response;
  }
  
  public function getResource($token) {
  
    /* get resource using token */
    $text = $this->__request(TCONNECT_SERVER . 'resource/', array(
              self::PARAM_CODE => $token
            ));
    
    if (strlen($text) > 0) {
    
      /* decode data */
      $data = @json_decode($text, true);

      /* token? */
      if ($data['type'] == 'resource') {
        $response = new TConnect_Response_Resource($data['resource']);
      } elseif ($data['type'] == 'error') {
        $response = new TConnect_Response_Error($data['code'], $data['error']['code'], $data['error']['message']);
      }
    
    } else {
      $response = new TConnect_Response_Error(403, 'no_resource', 'Resource returns no data!');
    }

    return $response;
  }
  
  public function handleResponse($unset = true) {
  
    $response = null;
  
    /* authorization code received */
    if (isset($_GET['code'])) {
    
      $response = new TConnect_Response_Authorization(trim($_GET['code']));
      if ($unset) { unset($_GET['code']); }
    
    /* error message received */
    } elseif (isset($_GET['error'])) {
    
      $response = new TConnect_Response_Error(403, trim($_GET['error']), trim($_GET['error_description']));

      if ($unset) { 
        unset($_GET['error']); 
        unset($_GET['error_description']); 
      }
    
    }
    
    return $response;
  }
}
?>