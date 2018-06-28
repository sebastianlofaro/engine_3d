<?php
require("config.php");
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
  case 'selectSubcategory':
    selectSubcategory();
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
 ?>
