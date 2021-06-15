<?php
/*
Plugin Name: Sweet URLs
Plugin URI: http://mrbuom.wordpress.com
Description: A simple plugin to make permalinks look *nicer*
Author: mrbuom
Version: 1.0.1
Author URI: http://mrbuom.wordpress.com
*/

function sweet_urls($title) {
  static $table = array();

  if (empty($table)) {
    if (file_exists(WP_PLUGIN_DIR. '/sweet-urls/i18n-ascii.txt')) {
      $table = parse_ini_file(WP_PLUGIN_DIR. '/sweet-urls/i18n-ascii.txt');
    }
  }

  if (! empty($table)) {
    $title = strtr($title, $table);
  }

  return $title;
}

add_filter('sanitize_title', 'sweet_urls', 1, 1);

?>