<?php
/**
 * The following page runs in a very specific order, be careful editing.
 */

//load base css and js first
jzdrop_add_css(JZDROP . '/theme/css/main.css');
jzdrop_add_js('https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
jzdrop_add_js(JZDROP . '/theme/js/main.js');

//page body
ob_start();
require_once(theme(get_page()));
$body = ob_get_clean();
ob_end_clean();

//page start
ob_start();
require_once(theme('page'));
$head = ob_get_clean();
ob_end_clean();

//print results:
print $head;
print $body;
print_each(jzdrop_add_js());
?>
  </body>
</html>
