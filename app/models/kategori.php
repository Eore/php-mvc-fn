<?php namespace model\kategori;

\database\connect()->query("
  create table if not exists kategori (
    kode varchar(5) primary key not null,
    kategori varchar(30) not null
  )
");

function tambahKategori($kode, $kategori) {
  $pre = \database\connect()->prepare('insert into kategori (kode, kategori) values (?, ?)');
  $pre->execute([$kode, $kategori]);
}

function listKategori($kode = null) {
  if ($kode == null) {
    $sql = 'select * from kategori';
  } else {
    $sql = 'select * from kategori where kode = ?';
  }
  $pre = \database\connect()->prepare($sql);
  $pre->execute([$kode]);
  return $pre->fetchAll();
}

function hapusKategori($kode) {
  $pre = \database\connect()->prepare('delete from kategori where kode = ?');
  $pre->execute([$kode]);
}

function editKategori($kode, $newData) {
  $pre = \database\connect()->prepare('update kategori set kategori = ? where kode = ?');
  $pre->execute([$newData, $kode]);
}