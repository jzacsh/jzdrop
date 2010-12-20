<?php

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
function li($list, $type='ul', $options=array()) {
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
