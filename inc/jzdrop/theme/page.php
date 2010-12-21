<?php
/**
 * Sets the basis for every page.
 */
?>
<html>
  <head>
    <title><?php print jzdrop_set_title(); ?></title>
    <?php print_each(jzdrop_add_css()); ?>
    <?php print_each(jzdrop_add_js()); ?>
  </head>
  <body>
