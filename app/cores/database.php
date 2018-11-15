<?php namespace database;

function connect() {
  $dbConfig = parse_ini_file('app/configs/database.ini');
  $connection = new \PDO(
    $dbConfig['driver'].':host='.$dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password']
  );
  $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  $connection->query('create database if not exists '.$dbConfig['database']);
  $connection->query('use '.$dbConfig['database']);
  return $connection;
}