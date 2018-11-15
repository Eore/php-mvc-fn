<?php
namespace model\berita;

require 'app/cores/database.php';

\database\connect()->query("
  create table if not exists berita (
    id integer primary key auto_increment,
    judul varchar(30) not null,
    isi text not null,
    createAt datetime default now()  
  )
");

function tambahBerita($judul, $isi) {
  $pre = \database\connect()->prepare('insert into berita (judul, isi) values (?, ?)');
  $pre->execute([$judul, $isi]);
}