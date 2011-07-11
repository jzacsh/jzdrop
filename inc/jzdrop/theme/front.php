<?php
/**
 * Custom page.
 */

/**
 * Miscellaneous links:
 */

$amazon = l('awesome stuff', 'http://amzn.com/w/3BQ5MBGPPCPZS');
$gprofile = l('I', 'http://profiles.google.com/jzacsh/');
$opts = array(
  'title' => 'Comprehensive, feature-rich git-scm manager with a great maintainer.'
);
$gitolite = l('gitolite', 'https://github.com/sitaramc/gitolite/wiki/', $opts);
$cilink = l('build_int',
  'https://github.com/jzacsh/bin/blob/master/share/build_int',
  array('title' => 'bash script to handle simple continuous integration builds.'));

/**
 * Social links:
 */

$opts = array(
  'title' => '@jzacsh, chit-chat',
  'class' => 'twitter',
);
$links[] = l('twitter', 'http://www.twitter.com/jzacsh/', $opts);

/* DIASPORA:
$opts = array(
  'class' => 'diaspora',
  'target' => '_blank',
);
$links[] = l('diaspora',
  'https://joindiaspora.com/people/4d06cfa62c174313c9000eb4', $opts);
*/

$opts = array(
  'class' => 'github',
  'title' => 'my super public, open source code',
);
$links[] = l('github', 'http://www.github.com/jzacsh/', $opts);

$opts = array('class' => 'code-jzacsh', 'title' => 'my open source code');
$links[] = l('+code', 'http://code.jzacsh.com/', $opts);

$opts = array('class' => 'drupal', 'title' => 'me in the drupal community');
$drupal = l('drupal', 'http://drupal.org/user/427067', $opts);
$links[] = $drupal;

foreach ($links as $data) {
  $items[] = array('data' => $data, 'class' => 'social');
}

$opts = array('class' => 'item-list', 'id' => 'places');
$places_list = li($items, 'ul', $opts);

/**
 * Code links:
 */

$bin_scripts = l('personal ~/bin/ scripts', 'https://github.com/jzacsh/bin');

$links = $items = array();

//time-clock bash script
$opts = array();
$code['punch'] = l('punch',
  'https://github.com/jzacsh/punch', $opts);

//flash card webapp in node.js
$opts = array();
$code['studyjs'] = l('study.js',
  'http://code.jzacsh.com/?p=foss/studyjs.git', $opts);

//drupal-related shell scripts.
$opts = array();
$code['drupalsh'] = l('drupalsh',
  'https://github.com/jzacsh/drupalsh', $opts);

//etherpad backup script
$opts = array();
$code['etherback'] = l('etherback',
  'https://github.com/jzacsh/bin/blob/master/share/etherback',
  $opts);

function forklnk($gitpath) {
  $output = NULL;
  $output .= '<span class="fork-this">';
  $output .= 'To fork this, run: <input class="code" type="text"';
  $output .= ' value="git clone '. $gitpath . '" / ></span>';
  return $output;
}

jzdrop_add_css(JZDROP . '/theme/css/front.css');
jzdrop_add_css(JZDROP . '/theme/js/front.js');
?>
<div id="main">

  <div id="content">
    <h1 class="whoami">Jonathan Zacsh</h1>
    <p class="story section">
      <?php print $gprofile; ?>'m a computer science student, currently working
      full time as a <?php print $drupal; ?> web developer. In my free time I'm
      usually studying node.js, client-side javascript, drupal module
      development, drupal theming, and just theming for the web in general. I
      am also a lover of the <?php print $amazon; ?> last.fm brings me way.
    </p>

    <h2 id="code" class="works">Code</h2>
    <div class="section">
      <p>Below are utilities I wrote either because I needed the tool myself or
        I wanted to play with the technology they're built in &#40;or
        both&#41;. More importantly though, these are utilities I tried to
        write with some sort of re&ndash;usability in mind, so others can
        enjoy. If anything comes in handy &#40;or breaks&#41; please feel free
        to let me know.</p>
      <dl class="codes">
        <dt><?php print $code['punch']; ?></dt>
        <dd>Punch is a <acronym title="Command Line Interface">cli</acronym>
          utility to handle time&ndash;tracking. Though punch was first written in
          bash for a &quot;punch&ndash;card&quot; model of use, I am now actively
          porting/rewriting it in node.js to provide a real&ndash;time web
          interface. <?php print forklnk('git://github.com/jzacsh/punch.git');
          ?></dd>

        <dt><?php print $cilink; ?></dt>
        <dd>Build&ndash;int a light-weight continous integration script written
          in bash to be run in cron and build on its own from git by polling for
          changes. <?php print forklnk('git://github.com/jzacsh/bin.git');
          ?></dd>

        <dt><?php print $code['studyjs']; ?></dt>
        <dd>Study.js is a flash card application to help you study. Under active
          development, study.js is being written in node.js with a mongodb data
          store. <?php print forklnk('git://jzacsh.com/foss/studyjs.git');
          ?></dd>

        <dt><?php print $code['drupalsh']; ?></dt>
        <dd>Drupalsh is a set of bash scripts and functions for Drupal
          developers who spend a lot of time on the command line doing running
          through typical drupal&ndash;related tasks. <?php
          print forklnk('git://github.com/jzacsh/drupalsh'); ?></dd>

        <dt><?php print $code['etherback']; ?></dt>
        <dd>etherback is a bash script to automatically backup any etherpad
          &#40;or any raw&ndash;text source&#41; document. Specifically, its
          made to run in cron, as this scirpt doesn't bother creating new
          backup files if it sees an old backup with the same contents already
          exists in its destination directory. <span class="fork-this">To fork
          this, run: <input class="code" type="text"
                value="curl -s https://raw.github.com/jzacsh/bin/master/share/etherback"
              /></span>
        </dd>
      </dl>
      <h3 id="other-code">Other Code</h3>
      <p>Sometimes I'll link to individual scripts I've written, up above in
        the main list, &#40;eg.: etherback&#41;. However, since none of them
        deserver their very own repo, feel free to just take a peek at my <?php
        print $bin_scripts; ?> and see if you find anything useful. The most
        useful stuff is generally in ~/bin/share and ~/bin/lib.</p>

      <p>Also, a lot of the studying I'm doing and code I'm writing for fun is
        in public space and open source, just not necessarily up on github. I
        keep all code that's not on github on <?php print
        l('my own server using gitolite', 'http://code.jzacsh.com/'); ?>.
      </p>

      <h4>Sneakily forking my stuff...</h4>
      <p>Gitweb sucks for sharing, in comparison to github, but its easy to set
        up and far more personal. If you want to sneak around and clone/mess
        with anything you see in my repos, then feel free - they're available
        on purpose :) &#40;there's plenty on there that you can't see!&#41; The
        port for git:// protocol is open, so you should be able to clone any
        project you find listed, by using the URL structure:
        <em class="url">
          git://jzacsh.com/<strong>directory/repo.git</strong>
        </em>
      </p>
      <p>
        So for example, to clone the "kittens" project from the URL:
        <em class="example url">http://code.jzacsh.com/?p=foss/kittens.git</em>
        just `git clone` the URL:
        <em class="example url">git://jzacsh.com/foss/kittens.git</em>
      </p>
    </div>
  </div><!--//#content-->

  <div class="sidebar notes">

    <div class="elsewhere">
      <span class="list-title">elsewhere:</span>
      <?php print $places_list; ?>
    </div><!--//.elsewhere-->

    <p id="built-ci" class="lesser">
      This page built continuously with <?php print $cilink; ?> and the help of
      <?php print $gitolite; ?>.
    </p>

    <div class="clearfix"></div>
  </div><!--//.sidebar.notes-->
  <div class="clearfix"></div>

</div><!--//#main-->
