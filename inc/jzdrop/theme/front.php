<?php
/**
 * Custom page.
 */
$opts = array('title' => '@jzacsh', 'class' => 'twitter');
$links[] = l('twitter', 'http://www.twitter.com/jzacsh/', $opts);

$opts = array('class' => 'github');
$links[] = l('github', 'http://www.github.com/jzacsh/', $opts);

foreach ($links as $data) {
  $items[] = array('data' => $data, 'class' => 'social');
}

$opts = array('class' => 'item-list', 'id' => 'sidebar');
$places_list = li($items, 'ul', $opts);

jzdrop_add_css(JZDROP . '/theme/css/main.css');
?>
<div id="main">
  <h3>Places to Find Me</h3>
  <?php print $places_list; ?>
  <p>I'm a computer science student, currently working as a Drupal web developer.</p>
</div><!--//#main-->
