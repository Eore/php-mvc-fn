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
  \model\berita\tambahBerita($_REQUEST['idKategori'], $_REQUEST['judul'], $_REQUEST['isi']);
  move_uploaded_file($_FILES['gambar']['tmp_name'], 'public/img/'.$_FILES['gambar']['name']);
  header('LOCATION: /berita');
}