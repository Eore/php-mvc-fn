<?php namespace view;

function render($view, $data = array()) {
  include "app/views/layout/header.phtml";
  include "app/views/$view.phtml";
  include "app/views/layout/footer.phtml";
}