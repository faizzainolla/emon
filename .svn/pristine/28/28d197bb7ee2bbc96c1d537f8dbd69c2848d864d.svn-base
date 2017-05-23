<?php
class TConnect_Response_Resource extends TConnect_Response {

  protected $_profile;
  protected $_contact;
  protected $_partial = false;

  function __construct($resources) {
  
    $this->_profile = new TConnect_Profile($resources);
    $this->_contact = new TConnect_Contact($resources);
    
    /* partial check */
    foreach ($resources as $scope => $resource) {
      if ($resource['code'] != 'OK') {
        $this->_partial = true;
        break;
      }
    }
    
    parent::__construct($resource);
  }
  
  public function getProfile() {
  
    return $this->_profile;
  }
  
  public function getContact() {
  
    return $this->_contact;
  }
  
  public function isPartial() {
  
    return $this->_partial;
  }
}
?>