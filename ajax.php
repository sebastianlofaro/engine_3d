<?php
require("config.php");
$action = isset($_GET['action']) ? $_GET['action'] : "";
$action = isset($_POST['action']) ? $_POST['action'] : $action;

switch ($action) {
  case 'selectSubcategory':
    selectSubcategory();
    break;

  case 'deleteImage':
    deleteImage();
    break;

  default:
    echo "ERROR";
    break;
}

function selectSubcategory() {
  $jobId = $_GET["jobId"];
  $jobs = Job::getListOfSubCat($jobId);
  echo json_encode($jobs);
}

function deleteImage() {
  $imageId = $_POST['imageId'];
  $imagePath = (string)JobImages::imagePathForId($imageId);
  JobImages::deleteImage($imageId);
  if (file_exists(dirname(__FILE__) . '/img/thumbnail/' . $imagePath )) {
    unlink(dirname(__FILE__) . '/img/thumbnail/' . $imagePath);
  }
}
 ?>
