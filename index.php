<?php
/**
 * Set the only necessary var.
 */
define('JZDROP', '/inc/jzdrop/');
define('DROP_ROOT', getcwd() . JZDROP);

/**
 * Run the work horse bootstrap function.
 */
require_once(DROP_ROOT . '/boot.php');
?>
