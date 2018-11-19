<?php namespace controller\berita;

require 'app/cores/view.php';
require 'app/models/berita.php';
require 'app/models/kategori.php';

function index() {
  $list = \model\berita\listBerita();
  \view\render('berita/index', [
    'title' => 'Berita',
    'list' => $list
  ]);
}

function tambah_berita() {
  $listKategori = \model\kategori\listKategori();
  \view\render('berita/tambahBerita', [
    'title' => 'Portal Berita',
    'listKategori' => $listKategori
  ]);
} 

function tambah() {
  // echo '<pre>';
  // var_dump($_POST);
  // var_dump($_FILES);
  // var_dump(getimagesize($_FILES['gambar']['tmp_name']));
  // echo '</pre>';
  // \model\berita\tambahBerita($_REQUEST['idKategori'], $_REQUEST['judul'], $_REQUEST['isi']);
  var_dump('public/img/'.$_FILES['name']);
  move_uploaded_file($_FILES['gambar']['tmp_name'], 'public/img/'.$_FILES['gambar']['name']);
  // header('LOCATION: /berita');
}