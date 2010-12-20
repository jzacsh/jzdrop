<?php
/**
 * Custom page.
 */
$opts = array('title' => '@jzacsh', 'class' => 'twitter', 'rel' => 'nofollow', 'target' => '_blank');
$links[] = l('twitter', 'http://www.twitter.com/jzacsh/', $opts);

/* DIASPORA:
$opts = array('class' => 'diaspora', 'rel' => 'nofollow', 'target' => '_blank');
$links[] = l('diaspora', 'https://joindiaspora.com/people/4d06cfa62c174313c9000eb4', $opts);
*/

$opts = array('class' => 'github', 'rel' => 'nofollow', 'target' => '_blank');
$links[] = l('github', 'http://www.github.com/jzacsh/', $opts);

foreach ($links as $data) {
  $items[] = array('data' => $data, 'class' => 'social');
}

$opts = array('class' => 'item-list', 'id' => 'places');
$places_list = li($items, 'ul', $opts);

jzdrop_add_css(JZDROP . '/theme/css/front.css');
?>
<div id="main">

  <div id="content">
    <h3 class="whoami">Jonathan Zacsh</h3>
    <p class="story">I'm a computer science student, currently working as a Drupal web developer.</p>
  </div><!--//#content-->

  <div id="notes">
    <?php print $places_list; ?>
  </div><!--//.notes-->

</div><!--//#main-->
