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

function tambah() {
  \model\kategori\tambahKategori($_REQUEST['kode'], $_REQUEST['kategori']);
  header("LOCATION: /kategori");
}

function edit($params, $query) {
  $kode = $query['kode'];
  switch ($params[0]) {
    case 'simpan':
      \model\kategori\editKategori($kode, $_REQUEST['kategori']);
      header("LOCATION: /kategori");
      break;
    
    default:
      $kategori = \model\kategori\listKategori($kode)[0];
      if ($kategori != null) {
        \view\render('kategori/edit', [
          'title' => 'Edit Kategori '.$kategori['kategori'],
          'kode' => $kategori['kode'],
          'kategori' => $kategori['kategori']
        ]);
      } else {
        header('LOCATION: /error/notfound');
      }
      break;
  }
}

function hapus($_, $query) {
  $kode = $query['kode'];
  \model\kategori\hapusKategori($kode);
  header("LOCATION: /kategori");
}