<?php namespace router;

function getURL() {
  $url = $_SERVER['REQUEST_URI'];
  $url = rtrim($url, '/');
  $url = ltrim($url, '/');
  return explode('/', $url);
}

function getController() {
  return getURL()[0];
}

function getMethod() {
  return getURL()[1];
}

function getParams() {
  return array_slice(getURL(), 2);
}

function getQuery() {
  return $_GET;
}