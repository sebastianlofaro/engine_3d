<?php
ini_set("display_errors", true);
date_default_timezone_set("America/Chicago");
define("DB_DSN", "mysql:host=localhost;dbname=engine_3d");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");
define("THUMBNAILS_PATH", "img/thumbnail/");
require(CLASS_PATH . "/Job.php");
require(CLASS_PATH . "/JobImages.php");

function handleException($exception) {
  echo $exception;
  error_log($exception->getMessage());
}

set_exception_handler('handleException');
 ?>
