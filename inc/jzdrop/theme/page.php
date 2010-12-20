<?php
/**
 * Sets the basis for every page.
 */
jzdrop_add_css(JZDROP . '/theme/css/main.css');
?>
<html>
  <head>
    <title><?php print jzdrop_set_title(); ?></title>
    <?php print_each(jzdrop_add_css()); ?>
    <?php print_each(jzdrop_add_js()); ?>
  </head>
  <body>
