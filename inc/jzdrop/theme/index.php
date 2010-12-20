<?php
/****************************************************************/
$opts = array('title' => '@jzacsh', 'class' => 'twitter');
$links[] = l('twitter', 'http://www.twitter.com/jzacsh/', $opts);

$opts = array('class' => 'github');
$links[] = l('github', 'http://www.github.com/jzacsh/', $opts);

foreach ($links as $data) {
  $items[] = array('data' => $data, 'class' => 'social');
}

$opts = array('class' => 'item-list', 'id' => 'sidebar');
$places_list = li($items, 'ul', $opts);

$title = 'Jonathan Zacsh';

/****************************************************************/
?>
<html>
  <head>
    <title><?php print $title; ?></title>
    <?php print $meta; ?>
  </head>
  <body>
    <div id="main">
      <h3>Places to Find Me</h3>
      <?php print $places_list; ?>
      <p>
        <?php print $; ?>
      </p>
    </div><!--//#main-->
  </body>
</html>
