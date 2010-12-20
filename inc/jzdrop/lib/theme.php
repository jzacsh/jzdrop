<?php

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
?>
  </body>
</html>
