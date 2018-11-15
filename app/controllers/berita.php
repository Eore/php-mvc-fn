<?php namespace controller\berita;

require 'app/cores/view.php';

function tambah() {
  \view\render('berita/tambahBerita', array(
    'title' => 'Portal Berita'
  ));
}