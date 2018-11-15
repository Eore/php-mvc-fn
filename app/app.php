<?php namespace app;

require 'app/cores/router.php';

function main() {
  $controller = \router\getController();
  $method = \router\getMethod();
  if (file_exists("app/controllers/$controller.php")) {
    require "app/controllers/$controller.php";
    if (function_exists("\controller\\$controller\\$method")) {
      $fn = "\controller\\$controller\\$method";
      $fn();
    } else {
      echo '404';
    }
  } else {
    echo '404';
  }
}