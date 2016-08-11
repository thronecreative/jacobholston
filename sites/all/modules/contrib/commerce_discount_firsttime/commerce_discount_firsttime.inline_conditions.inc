<?php
/**
 * @file
 * commerce_discount_firsttime.inline_conditions.inc
 */

/**
 * Implements hook_inline_condition_info().
 */
function commerce_discount_firsttime_inline_conditions_info() {
  $conditions = array();

  if (module_exists('commerce_order')) {
    $conditions['commerce_order_first_time'] = array(
      'label' => t('First Time Customer'),
      'entity type' => 'commerce_order',
      'callbacks' => array(
        'configure' => 'commerce_discount_firsttime_configure',
        'build' => 'commerce_discount_firsttime_customer_build',
      ),
    );
  }

  return $conditions;
}

/**
 * Implements (REQUIRED) configuration callback for rule condition assignment.
 */
function commerce_discount_firsttime_configure($settings) {
  $form = array();

  $form['firsttime_settings'] = array(
    '#markup' => '| This Discount <strong><u>only</u></strong> applies if this is the users very first order',
  );

  $form['required_element'] = array(
    '#type' => 'textfield',
    '#disabled' => TRUE,
    '#access' => FALSE,
    '#default_value' => 'This hidden field is required to circumvent rule condition bug in the inline_conditions module',
  );

  return $form;
}
