<?php namespace app;

require 'app/cores/database.php';
require 'app/cores/router.php';

function main() {
  $controller = \router\getController();
  $method = \router\getMethod();
  if (file_exists("app/controllers/$controller.php")) {
    require "app/controllers/$controller.php";
    if (function_exists("\controller\\$controller\\$method")) {
      $fn = "\controller\\$controller\\$method";
      $fn(\router\getParams());
    } else {
      header("LOCATION: /$controller/index");
    }
  } else {
    header('LOCATION: /error/notfound');
  }
}