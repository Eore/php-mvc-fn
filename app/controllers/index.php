<?php namespace controller\index;

require 'app/cores/view.php';
require 'app/models/berita.php';

function index() {
  $list = \model\berita\listBerita();
  \view\render('berita/index', [
    'title' => 'Berita',
    'list' => $list
  ]);
}