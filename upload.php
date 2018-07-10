<?php
header('Content-Type: application/json');
require( "config.php" );

$job = $_REQUEST['jobId'];
$uploaded = array();
//$lastImageId = JobImages::getLastImageNumberForJob($job)[0];
//$lastImageId = JobImages::lastId();

// TEST AREA __________________________________________________________

foreach ($_FILES['files']['name'] as $position => $name) {
  $uploaded[] = array(
    'imagePath' => 'temp',
    'jobId' => (int)$job,
    'imageNumber' => $position
  );
}

JobImages::addJobImagesToDatabase($uploaded);
JobImages::updateJobImageNames();

// if (!empty($_FILES['files']['tmp_name'][0])) {
//   if (!file_exists(dirname(__FILE__) . "/img/thumbnail/" . $job)) {
//     $oldmask = umask(0);
//     mkdir(dirname(__FILE__) . "/img/thumbnail/" . $job, 0777);
//     umask($oldmask);
//
//   }
//   foreach ($_FILES['files']['name'] as $position => $name) {
//     $photoName = $position + 1 + $lastImageId;
//     $photoName =
//     $imagePath = "{$job}/{$photoName}";
//     if (move_uploaded_file($_FILES['files']['tmp_name'][$position], "img/thumbnail/" . $job . '/' . $photoName)) {
//       $uploaded[] = array(
//         'imagePath' => (string)$imagePath,
//         'jobId' => (int)$job,
//         'imageNumber' => (int)$photoName
//       );
//     }
//   }
echo json_encode($uploaded);

// TEST AREA __________________________________________________________


// if (!empty($_FILES['files']['tmp_name'][0])) {
//   if (!file_exists(dirname(__FILE__) . "/img/thumbnail/" . $job)) {
//     $oldmask = umask(0);
//     mkdir(dirname(__FILE__) . "/img/thumbnail/" . $job, 0777);
//     umask($oldmask);
//
//   }
//   foreach ($_FILES['files']['name'] as $position => $name) {
//     $photoName = $position + 1 + $lastImageId;
//     $imagePath = "{$job}/{$photoName}";
//     if (move_uploaded_file($_FILES['files']['tmp_name'][$position], "img/thumbnail/" . $job . '/' . $photoName)) {
//       $uploaded[] = array(
//         'imagePath' => (string)$imagePath,
//         'jobId' => (int)$job,
//         'imageNumber' => (int)$photoName
//       );
//     }
//   }
//  JobImages::addJobImagesToDatabase($uploaded);
//   // get list of image id's
//
//   // rename file with id
//   // update database with new filenames
//   //echo json_encode(JobImages::getJobImages($job)["results"]);
// }

 ?>
