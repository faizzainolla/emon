<?php
class TConnect_Response_Token extends TConnect_Response {

  protected $_access;
  protected $_refresh;

  public function __construct($access, $refresh) {
  
    $this->_access = $access;
    $this->_refresh = $refresh;
    parent::__construct($access . ' ' . $refresh);
  }
  
  public function getAccessToken() {
  
    return $this->_access;
  }
  
  public function getRefreshToken() {
  
    return $this->_refresh;
  }
}
?>