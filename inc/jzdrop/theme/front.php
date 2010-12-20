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

$opts = array('class' => 'item-list', 'id' => 'places');
$places_list = li($items, 'ul', $opts);

jzdrop_add_css(JZDROP . '/theme/css/front.css');
?>
<div id="main">

  <div class="notes">
    <?php print $places_list; ?>
  </div><!--//.notes-->

  <div class="content">
    <p class="story">I'm a computer science student, currently working as a Drupal web developer.</p>
  </div><!--//.content-->

</div><!--//#main-->
