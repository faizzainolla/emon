<?php
class TConnect_Response_Error extends TConnect_Response {

  protected $_code;
  protected $_error;
  protected $_description;

  function __construct($code, $error, $description) {
    
    $this->_code = $code;
    $this->_error = $error;
    $this->_description = $description;
    parent::__construct($code . ': ' . $error . ' = ' . $description);
  }
  
  public function getCode() {
  
    return $this->_code;
  }
  
  public function getError() {
  
    return $this->_error;
  }
  
  public function getDescription() {
  
    return $this->_description;
  }
}
?>