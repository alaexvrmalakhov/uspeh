<?php

// $Id: taxonomy_menu_trails.admin.inc,v 1.1 2010/04/07 12:54:24 dmitriytrt Exp $

/**
 * @file
 * Settings form for taxonomy_menu_trails.
 *
 * @author Dmitriy.trt      <http://drupal.org/user/329125>
 */

function taxonomy_menu_trails_settings() {
  $form = array(
    'taxonomy_menu_trails_node_types' => array(
      '#type' => 'checkboxes',
      '#title' => t('Node types to set active trail'),
      '#options' => node_get_types('names'),
      '#default_value' => variable_get('taxonomy_menu_trails_node_types', array()),
    ),
    'taxonomy_menu_trails_only_without_menu' => array(
      '#type' => 'checkbox',
      '#title' => t("Only if node doesn't have enabled menu item"),
      '#default_value' => variable_get('taxonomy_menu_trails_only_without_menu', TRUE),
    ),
    'taxonomy_menu_trails_selection_method' => array(
      '#type' => 'select',
      '#title' => t("Node's term selection method"),
      '#description' => t("This option switches how module chooses term for processing:<ul><li><b>First/Last</b> - just select lightest/haviest node's term (but it can be the term without menu item) - best performance</li><li><b>First/last with menu</b> - find first/last term with enabled menu item - lower performance</li></ul>"),
      '#default_value' => variable_get('taxonomy_menu_trails_selection_method', 'first'),
      '#options' => array(
        'first' => t('First term'),
        'last' => t('Last term'),
        'first-with-menu' => t('First term with menu'),
        'last-with-menu' => t('Last term with menu'),
      ),
    ),
  );
  
  if (module_exists('taxonomy_menu')) {
    $form['taxonomy_menu_trails_integration_with_tm'] = array(
      '#type' => 'checkbox',
      '#title' => t("Get term's path from Taxonomy Menu modules"),
      '#description' => t("If you set up not default path for terms' menu items with Taxonomy Menu modules, module will use this paths."),
      '#default_value' => variable_get('taxonomy_menu_trails_integration_with_tm', TRUE),
    );
  }
  
  return system_settings_form($form);
}
