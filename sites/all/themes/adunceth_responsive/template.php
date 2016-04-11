<?php

/**
 * @file
 * template.php
 */

 /**
  * Overrides theme_menu_link().
*/
 function adunceth_responsive_menu_link(array $variables) {
   $element = $variables['element'];
   $sub_menu = '';

   if ($element['#below']) {
     // Prevent dropdown functions from being added to management menu so it
     // does not affect the navbar module.
     
     if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
       $sub_menu = drupal_render($element['#below']);
     }
     elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] <= 17)) {
       // Add our own wrapper.
       unset($element['#below']['#theme_wrappers']);
       $sub_menu = '<ul class="submenu">' . drupal_render($element['#below']) . '</ul>';
       // Generate as standard dropdown.
      //  $element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown level-'.$element['#original_link']['depth'];
      //  $element['#localized_options']['html'] = TRUE;

       // Set dropdown trigger element to # to prevent inadvertant page loading
       // when a submenu link is clicked.
       $element['#localized_options']['attributes']['data-target'] = '#';
       $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      //  $element['#localized_options']['attributes']['data-toggle'] = '';
      $submenu="<p>Hola Mundo3</p>";
     }
   } else $submenu="<p>Hola Mundo</p>";
   // On primary navigation menu, class 'active' is not set on active menu item.
   // @see https://drupal.org/node/1896674
   if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
     $element['#attributes']['class'][] = 'active';
   }
   $output = l($element['#title'], $element['#href'], $element['#localized_options']);
   return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
 }

 // function adunceth_responsive_menu_tree(&$variables) {
 //   return '<div class="nav-collapse"><ul class="menu nav">' . $variables['tree'] . '</ul></div>'; // added the nav-collapse wrapper so you can hide the nav at small size
 // }
 //
 //
 // function adunceth_responsive_menu_link(array $variables) {
 //   $element = $variables['element'];
 //   $sub_menu = '';
 //
 //     if ($element['#below']) {
 //     // Ad our own wrapper
 //     unset($element['#below']['#theme_wrappers']);
 //     $sub_menu = '<ul>' . drupal_render($element['#below']) . '</ul>'; // removed flyout class in ul
 //     unset($element['#localized_options']['attributes']['class']); // removed flydown class
 //     unset($element['#localized_options']['attributes']['data-toggle']); // removed data toggler
 //
 //     // Check if this element is nested within another
 //     if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1)) {
 //
 //       unset($element['#attributes']['class']); // removed flyout class
 //     }
 //     else {
 //       unset($element['#attributes']['class']); // unset flyout class
 //       $element['#localized_options']['html'] = TRUE;
 //       $element['#title'] .= ''; // removed carat spans flyout
 //     }
 //
 //     // Set dropdown trigger element to # to prevent inadvertent page loading with submenu click
 //     $element['#localized_options']['attributes']['data-target'] = '#'; // You could unset this too as its no longer necessary.
 //   }
 //
 //   $output = l($element['#title'], $element['#href'], $element['#localized_options']);
 //   return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
 // }
