<?php
/**
 * Sets the basis for every page.
 */
function add_css($path) {
  $output = NULL;
  $output .= '<link type="text/css" rel="stylesheet" media="all"';
  $output .= 'href="'. $path .'">';
  return $output;
}

function add_js($path) {
  $output = NULL;
  $output .= '<script type="text/javascript" src="';
  $output .= $path . '">';
  $output .= '</script>';
  return $output;
}
?>
<html>
  <head>
    <title><?php print jzdrop_set_title(); ?></title>
    <?php //load base css and js first ?>
    <?php print add_js('https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'); ?>
    <?php print add_css(JZDROP . 'theme/css/main.css'); ?>
    <?php print add_js(JZDROP . 'theme/js/main.js'); ?>
    <?php print add_js(JZDROP . 'theme/js/front.js'); ?>
    <?php print_each(jzdrop_add_css()); ?>
  </head>
  <body>
