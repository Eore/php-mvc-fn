<?php namespace controller\error;

require 'app/cores/view.php';

function notfound() {
  \view\render('error/404', array(
    'title' => 'Not Found'
  ));
}