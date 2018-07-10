<?php

// Class to handle Jobs at a high level

class Job
{
  public $id = null;
  public $name = null;
  public $imagePath = null;
  public $jobId = null;
  public $jobCategory = null;

  public function __construct($data = array()) {
    if (isset($data['id'])) $this->id = (int) $data['id'];
    if (isset($data['name'])) $this->name = $data['name'];
    if (isset($data['imagePath'])) $this->imagePath = $data['imagePath'];
    if (isset($data['jobId'])) $this->jobId = (int) $data['jobId'];
    if (isset($data['jobCategory'])) $this->jobCategory = (int) $data['jobCategory'];
  }

  public function storeFormValues ($params) {
    $this->__construct($params);
  }

  public static function jobCategoryForId($jobId) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT jobCategory FROM jobs WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(':id', $jobId, PDO::PARAM_INT);
    $st->execute();
    $result = $st->fetch()[0];
    $conn = null;
    return $result;
  }

  public static function getListOfSubCat($key) {
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM jobs WHERE jobId = $key";

    $st = $conn->prepare($sql);
    $st->execute();
    $list = array();

    while($row = $st->fetch()) {
      $job = new Job($row);
      $list[] = $job;
    }

    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query($sql)->fetch();
    $conn = null;

    return (array("results"=>$list,"totalRows"=>$totalRows[0]));
  }

  public function insert() {
    if(!is_null($this->id)) trigger_error("Attempt to insert a Job object that already has its ID property set", E_USER_ERROR);
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "INSERT INTO jobs (name, imagePath, jobId, jobCategory) VALUES (:name, :imagePath, :jobId, :jobCategory)";
    $st = $conn->prepare($sql);
    $st->bindValue(':name', $this->name, PDO::PARAM_STR);
    $st->bindValue(':imagePath', $this->imagePath, PDO::PARAM_STR);
    $st->bindValue(':jobId', $this->jobId, PDO::PARAM_INT);
    $st->bindValue(':jobCategory', $this->jobCategory, PDO::PARAM_INT);
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


}


 ?>
