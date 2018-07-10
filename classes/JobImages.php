<?php

class JobImages {
  public $id = null;
  public $imagePath = null;
  public $jobId = null;
  public $imageNumber = null;

  public function __construct($data = array()) {
    if (isset($data['id'])) $this->id = (int) $data['id'];
    if (isset($data['imagePath'])) $this->imagePath = $data['imagePath'];
    if (isset($data['jobId'])) $this->jobId = (int) $data['jobId'];
    if (isset($data['imageNumber'])) $this->imageNumber = (int) $data['imageNumber'];
  }

  public function storeValues($params) {
    $this->__construct($params);
  }

  public function insert() {
    if(!is_null($this->id)) trigger_error("Attempt to insert a JobImage object that already has its ID property set", E_USER_ERROR);
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "INSERT INTO jobImages (imagePath, jobId, imageNumber) VALUES (:imagePath, :jobId, :imageNumber)";
    $st = $conn->prepare($sql);
    $st->bindValue(':imagePath', $this->imagePath, PDO::PARAM_STR);
    $st->bindValue(':jobId', $this->jobId, PDO::PARAM_INT);
    $st->bindValue(':imageNumber', $this->imageNumber, PDO::PARAM_INT);
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }

  public static function deleteImage($imageId) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $st = $conn->prepare("DELETE FROM jobImages WHERE id = :id LIMIT 1");
    $st->bindValue(':id', $imageId, PDO::PARAM_INT);
    $st->execute();
    $conn = null;
  }

  public static function imagePathForId($id) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $st = $conn->prepare("SELECT imagePath FROM jobImages WHERE id = :id");
    $st->bindValue(':id', $id, PDO::PARAM_INT);
    $st->execute();
    return $st->fetch()[0];
  }

  public static function addJobImagesToDatabase($uploaded) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "INSERT INTO jobImages (imagePath, jobId, imageNumber) VALUES ";
    foreach ($uploaded as $key => $value) {
      $sql = $sql . " ('{$value['imagePath']}', {$value['jobId']}, {$value['imageNumber']}),";
    }
    $sql = rtrim($sql,",");
    $st = $conn->prepare($sql);
    $st->execute();
    $conn = null;
  }

  public static function updateJobImageNames() {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT * FROM jobImages WHERE imagePath = 'temp' ";
    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();
    while($row = $st->fetch()) {
      $jobImage = new JobImages($row);
      $list[] = $jobImage;
    }
    $conn = null;
    foreach ($list as $key => $value) {
      $imagePath = $value->jobId . "/" . $value->id;
      $oldImageNumber = $value->imageNumber;
      $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
      $sql = "UPDATE jobImages SET imagePath = :imagePath WHERE imagePath = 'temp' AND imageNumber = :oldImageNumber";
      $st = $conn->prepare($sql);
      $st->bindValue(':imagePath', $imagePath, PDO::PARAM_STR);
      $st->bindValue(':oldImageNumber',$oldImageNumber, PDO::PARAM_INT);
      $st->execute();
      $conn = null;
      var_dump($value);
    }
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

  public static function getLastImageNumberForJob($job) {
    $largestNumber = 0;

    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT imageNumber FROM jobImages WHERE jobId = :job";
    $st = $conn->prepare($sql);
    $st->bindValue(":job", $job, PDO::PARAM_INT);
    $st->execute();
    $conn = null;

    $list = array();
    while($row = $st->fetch()) {
      $list[] = $row;
    }

    foreach ($list as $key => $imageNumber) {
      if ($imageNumber > $largestNumber) {
        $largestNumber = $imageNumber;
      }
    }

    return $largestNumber;
  }

  public static function lastId() {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT MAX(id) FROM jobImages";
    $st = $conn->prepare($sql);
    $st->execute();
    return $st->fetch()[0];
  }
}

 ?>
