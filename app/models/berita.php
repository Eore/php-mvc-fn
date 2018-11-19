<?php namespace model\berita;

\database\connect()->query("
  create table if not exists berita (
    id integer primary key auto_increment,
    judul varchar(30) not null,
    isi text not null,
    gambar varchar(100) not null,
    createAt datetime default now(),
    kode_kategori varchar(5) not null,
    foreign key (kode_kategori) references kategori(kode)
  )
");

function tambahBerita($idKategori, $judul, $isi, $gambar) {
  $pre = \database\connect()->prepare('insert into berita (judul, isi, gambar, kode_kategori) values (?, ?, ?, ?)');
  $pre->execute([$judul, $isi, $gambar, $idKategori]);
}

function listBerita($id = null) {
  if ($id == null) {
    $sql = 'select * from berita join kategori on berita.kode_kategori = kategori.kode order by createAt desc'; } 
  else {
    $sql = 'select * from berita where id = ? join kategori on berita.kode_kategori = kategori.kode order by createAt desc';
  }
  $pre = \database\connect()->prepare($sql);
  $pre->execute([$id]);
  return $pre->fetchAll();
}