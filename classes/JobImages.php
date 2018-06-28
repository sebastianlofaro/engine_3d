<?php

class JobImages {
  public $id = null;
  public $imagePath = null;
  public $jobId = null;

  public function __construct($data = array()) {
    if (isset($data['id'])) $this->id = (int) $data['id'];
    if (isset($data['imagePath'])) $this->imagePath = $data['imagePath'];
    if (isset($data['jobId'])) $this->jobId = (int) $data['jobId'];
  }

  public function storeValues($params) {
    $this->__construct($params);
  }

  public static function getJobImages($key) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM jobImages WHERE jobId = $key";

    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while($row = $st->fetch()) {
      $jobImage = new JobImages($row);
      $list[] = $jobImage;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query($sql)->fetch();
    $conn = null;

    return (array("results"=>$list,"totalRows"=>$totalRows[0]));
  }
}

 ?>
