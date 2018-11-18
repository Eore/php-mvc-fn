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

function listKategori() {
  $pre = \database\connect()->prepare('select * from kategori');
  $pre->execute();
  return $pre->fetchAll();
}