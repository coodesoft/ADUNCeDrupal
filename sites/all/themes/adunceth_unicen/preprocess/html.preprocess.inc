<?php

/**
 * Implements hook_preprocess_html().
 */
function adunceth_preprocess_html(&$vars) {
  // Add font awesome cdn.
  drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css', array(
     'type' => 'external'
  ));
}
