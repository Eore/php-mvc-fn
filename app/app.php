<?php namespace app;

require 'app/cores/database.php';
require 'app/cores/router.php';

function main() {
  $controller = \router\getController();
  $method = \router\getMethod();
  if ($controller == '') {
    require "app/controllers/index.php";
    \controller\index\index();
  } else 
  if (file_exists("app/controllers/$controller.php")) {
    require "app/controllers/$controller.php";
    if (function_exists("\controller\\$controller\\$method")) {
      $fn = "\controller\\$controller\\$method";
      $fn(\router\getParams(), \router\getQuery());
    } else {
      header("LOCATION: /$controller/index");
    }
  } else {
    header('LOCATION: /error/notfound');
  }
}