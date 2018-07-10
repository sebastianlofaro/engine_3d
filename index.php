<?php

require("config.php");
$action = isset($_GET['action']) ? $_GET['action'] : "home";

switch ($action) {
  case 'selectSubcategory':
    selectSubcategoryForId();
    break;

  case 'selectJob':
    selectJobForId();
    break;

  default:
    homes();
    break;
}

function selectSubcategoryForId() {
  $subCatID = $_GET['id'];
  $data = Job::getListOfSubCat($subCatID);
  require(TEMPLATE_PATH . '/top-level-portfolio.php');
}

function selectJobForId() {
  $jobId = $_GET['job'];
  $subCatID = Job::jobCategoryForId($jobId);
  $data = JobImages::getJobImages($jobId);
  require(TEMPLATE_PATH . '/detail-level-portfolio.php');
}

function homes() {
  $subCatID = 0;
  $data = Job::getListOfSubCat($subCatID);
  require(TEMPLATE_PATH . '/top-level-portfolio.php');
}

 ?>
