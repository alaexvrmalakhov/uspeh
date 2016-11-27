<?php

// $Id: taxonomy_menu_trails.inc,v 1.1 2010/04/07 12:54:24 dmitriytrt Exp $

/**
 * @file
 * Processing functions for taxonomy_menu_trails.
 *
 * @author Dmitriy.trt      <http://drupal.org/user/329125>
 */

function _taxonomy_menu_trails_get_path($term) {
  //Integration with Taxonomy Menu modules
  if (module_exists('taxonomy_menu') && variable_get('taxonomy_menu_trails_integration_with_tm', TRUE))
    return taxonomy_menu_create_path($term->vid, $term->tid);
  else
    return taxonomy_term_path($term);
}

function _taxonomy_menu_trails_process($item) {
  $href = NULL;
  $taxonomy = &$item['page_arguments'][0]->taxonomy;
  switch (variable_get('taxonomy_menu_trails_selection_method', 'first')) {
    case 'first':
      $term = reset($taxonomy);
      break;
    case 'last':
      $term = end($taxonomy);
      break;
    case 'first-with-menu':
      for ($term = reset($taxonomy); $term !== NULL; $term = next($taxonomy)) {
        $href = _taxonomy_menu_trails_get_path($term);
        if (db_result(db_query('SELECT COUNT(*) FROM {menu_links} WHERE link_path = "%s" AND hidden = 0', $href)) > 0) {
          break;
        }
      }
      break;
    case 'last-with-menu':
      for ($term = end($taxonomy); $term !== NULL; $term = prev($taxonomy)) {
        $href = _taxonomy_menu_trails_get_path($term);
        if (db_result(db_query('SELECT COUNT(*) FROM {menu_links} WHERE link_path = "%s" AND hidden = 0', $href)) > 0) {
          break;
        }
      }
      break;
    default:
      return;
  }
  
  if ($term === NULL)
    return;
  
  if ($href === NULL)
    $href = _taxonomy_menu_trails_get_path($term);
  $item['href'] = $href;
  
  menu_set_item(NULL, $item);
}
