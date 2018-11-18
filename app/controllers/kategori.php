<?php namespace controller\kategori;

require 'app/cores/view.php';
require 'app/models/kategori.php';

function index() {
  $list = \model\kategori\listKategori();
  \view\render('kategori/index', [
    'title' => 'Kategori',
    'list' => $list
  ]);
}

function tambah($params) {
  \model\kategori\tambahKategori($_REQUEST['kode'], $_REQUEST['kategori']);
  header("LOCATION: /kategori");
}

function edit($params) {
  // if ($params != null) {

  // } e
}