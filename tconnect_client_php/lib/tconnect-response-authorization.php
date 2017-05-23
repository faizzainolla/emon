<?php
class TConnect_Response_Authorization extends TConnect_Response {

  public function getAuthorizationCode() {
  
    return $this->getData();
  }
}
?>