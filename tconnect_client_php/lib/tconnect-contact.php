<?php
class TConnect_Contact {
  
  protected $_email = null;
  protected $_phone = null;
  protected $_flexi = null;
  
  function __construct($resource) {
  
    if (isset($resource['contact'])) {
      $contact = $resource['contact'];
      if ($contact['code'] == 'OK') {
        $this->_email = $contact['email'];
        $this->_phone = $contact['mobile'];
        $this->_flexi = $contact['flexi'];
      }
    }
  }
  
  public function getEMail() {
  
    return $this->_email;
  }
  
  public function getPhone() {
  
    return $this->_phone;
  }
  
  public function getFlexi() {
  
    return $this->_flexi;
  }
}
?>