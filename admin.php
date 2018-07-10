<?php

require("config.php");
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

echo "ADMIN PAGE";

switch ($action) {
  case 'login':
    login();
    break;

  case 'logout':
    logout();
    break;

  case 'editJob':
    editJob();
    break;

  case 'newJob':
    newJob();
    break;

  default:
    home();
    break;
}

function login() {
  $results = array();

  if (isset($_POST['login'])) {
    if ($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD) {
      // Login Successful
      $_SESSION['username'] = ADMIN_USERNAME;
      header('Location: admin.php');
    }
    else {
      $results['errorMessage'] = 'Incorrect username or password. Please try again.';
      require(TEMPLATE_PATH . '/admin/loginForm.php');
    }
  } else {
    // User has not posted the login form yet: display the form
    require(TEMPLATE_PATH . '/admin/loginForm.php');

  }
}

function logout() {
  unset($_SESSION['username']);
  header('Location: admin.php');
}

function home() {
  $subCatID = 0;
  $data = array();
  $jobs = Job::getListOfSubCat(0);

  $data['results'] = $jobs['results'];
  $data['totalJobs'] = $jobs['totalRows'];

  require(TEMPLATE_PATH . '/admin/top-level-portfolio.php');
}

function editJob() {
  $jobId = isset($_GET['jobId']) ? $_GET['jobId'] : "";
  $jobImages = JobImages::getJobImages($jobId);
  $jobImages = $jobImages['results'];
  $subCatID = Job::jobCategoryForId($jobId);

  require(TEMPLATE_PATH . '/admin/detail-level-portfolio.php');
}

function newJob() {

}


 ?>
