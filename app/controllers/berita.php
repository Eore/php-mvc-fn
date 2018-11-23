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
  $uid = dechex(time().rand(0,99999999));
  $ext = explode('/',$_FILES['gambar']['type'])[1];
  $gambar = $uid.'.'.$ext;
  \model\berita\tambahBerita(
    $_REQUEST['idKategori'],
    $_REQUEST['judul'],
    $_REQUEST['isi'],
    $gambar
  );
  move_uploaded_file($_FILES['gambar']['tmp_name'], 'public/img/'.$gambar);
  header('LOCATION: /berita');
}