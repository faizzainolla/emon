<?php
class TConnect_Profile {
  
  protected $_id = null;
  protected $_name = null;
  protected $_city = null;
  
  function __construct($resource) {
  
    if (isset($resource['profile'])) {
      $profile = $resource['profile'];
      if ($profile['code'] == 'OK') {
        $this->_id = $profile['id'];
        $this->_name = $profile['name'];
        $this->_city = $profile['city'];
      }
    }
  }
  
  public function getId() {
  
    return $this->_id;
  }
  
  public function getName() {
  
    return $this->_name;
  }
  
  public function getCity() {
  
    return $this->_city;
  }
}
?>