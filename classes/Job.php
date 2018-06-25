<?php

// Class to handle Jobs at a high level

class Job
{
  public $id = null;
  public $imagePath = null;

  public function __construct($data = array()) {
    if (isset($data['id'])) $this->id = (int) $data['id'];
    if (isset($data['imagePath'])) $this->imagePath = $data['imagePath'];
  }

  public function storeFormValues ($params) {
    $this->__construct($params);
  }

  public static function getListOfSubCat($key) {
    
  }

}


 ?>
