<?php
/**
 * Basic Library Functions of jzdrop
 */


/**
 * Helper functions to print jzdrop_set_{title,js,css}.
 * @param  items  array of resource html strings for css/js
 */
function print_each($items = array()) {
  foreach ($items as $item) {
    print $item;
  }
}

/**
 * Set the current page title.
 */
function jzdrop_set_title($title = NULL) {
  static $stored_title;

  if (isset($title)) {
    $stored_title = $title;
  }

  return $stored_title;
}

/**
 * Add js file to header
 */
function jzdrop_add_js($file = NULL) {
  static $js = array();
  
  if (isset($file)) {
    $line  = '<script type="text/javascript"';
    $line .= 'src="' . $file . '"></script>';
    $js[] = $line;
  }

  return $js;
}

/**
 * Add css file to header
 */
function jzdrop_add_css($file = NULL, $media = all) {
  static $css = array();
  
  if (isset($file)) {
    $line  = '<link type="text/css" rel="stylesheet"';
    $line .= ' media="' . $media . '" href="' . $file . '" />';
    $css[] = $line;
  }

  return $css;
}

/**
 * Get the current page file.
 */
function get_page() {
  $path = get_path();

  switch (count($path)) {
    case 1:
      switch (array_pop($path)) {
        case 'blog':
          return 'blog';
          break;
      }
      break;

    default:
      break;
  }

  //default
  return 'front';
}

/**
 * Returns data on the current path
 */
function get_path() {
  return explode('/', $_GET['q']);
}

/**
 * Function to output a particular page
 */
function theme($page = 'front') {
  $fpath = DROP_ROOT . '/theme/' . $page . '.php';
  return file_exists($fpath)? $fpath : FALSE;
}

/**
 * jz Debugger
 */
function jd($val = NULL, $label = NULL) {
  if (is_null($val)) {
    return FALSE;
  }
  else {
    ob_start();

    if (!is_null($label)) {
      print_r($label . ":\n");
    }
    print_r($val);
    $out = ob_get_clean() . "\n";
    ob_end_clean();

    $fname = '/tmp/jd.txt';
    $fh = fopen($fname, 'a');
    fwrite($fh, $out);
    fclose($fh);
  }
}

/**
 * Link function
 */
function l($txt, $path, $options) {
  $opts = NULL;
  if (is_array($options) && count($options)) {
    foreach ($options as $attr => $val) {
      $opts .= ' ' . $attr . '="' . $val . '"';
    }
  }

  return '<a href="' . $path . '"' . $opts . '>' . $txt . '</a>';
}

/**
 * Listing function, using <li>
 */
function li($list, $type = 'ul', $options = array()) {
  if (!is_array($list)) {
    return FALSE; //sanity check
  }

  //build top-level attributes
  $opts = NULL;
  if (count($options)) {
    foreach ($options as $attr => $val) {
      $opts .= ' ' . $attr . '="' . $val . '"';
    }
  }
  else {
    $opts = ' class="item-list"';
  }

  //build list
  $cap['start'] = '<' . $type . $opts . '>';
  $cap['end'] = '</' . $type . '>';
  $li_items = array();
  foreach ($list as $idx => $item) {
    $css_class = array();

    //is this an end-cap
    if ($idx == 0) {
      array_push($css_class, 'first');
    }
    else if ($idx == (count($list) - 1)) {
      array_push($css_class, 'last');
    }

    // build item-level attributes
    $data = "\n";
    if (is_array($item)) {
      if (array_key_exists('data', $item)) {
        foreach ($item as $attr => $val) {
          if ($attr == 'class') {
            array_push($css_class, $val);
          }
          else if ($attr == 'data') {
            $data = $val;
          }
          else {
            $opts .= ' ' . $attr . '="' . $val . '"';
          }
        }
      }
      else {
        continue; //invalid list item passed
      }
    }
    else {
      $data = $item;
    }

    //build class attribute
    if (count($css_class)) {
      $css = ' class="' . implode(' ', $css_class) . '"';
    }
    else {
      $css = NULL;
    }

    $data .= "\n";
    array_push($li_items, '<li' . $css . '>' . $data . '</li>');
  }

  //build the items that were accumulated
  if (count($li_items)) {
    $html  = $cap['start'];
    $html .= "\n" . implode("\n", $li_items) . "\n";
    $html .= $cap['end'];
    return $html;
  }
  else {
    //all items failed to build properly
    return FALSE;
  }
}

?>
