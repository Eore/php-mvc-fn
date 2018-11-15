<?php namespace router;

function getURL() {
  $url = $_SERVER['REQUEST_URI'];
  $url = rtrim($url, '/');
  $url = ltrim($url, '/');
  return $url;
}

function getController() {
  return explode('/',getURL())[0];
}

function getMethod() {
  return explode('/',getURL())[1];
}

function getParams() {
  return array_slice(getURL(), 2);
}

function getQuery() {
  return $_GET;
}