<?php
/**
 * @file
 * commerce_discount_firsttime.rules.inc
 */

/**
 * Implements hook_rules_condition_info().
 */
function commerce_discount_firsttime_rules_condition_info() {
  $inline_conditions = inline_conditions_get_info();
  $conditions = array();
  $conditions['commerce_order_first_time'] = array(
    'label' => t('Users First Order'),
    'parameter' => array(
      'commerce_order' => array(
        'label' => t('Order'),
        'description' => t('The order.'),
        'type' => 'commerce_order',
        'wrapped' => TRUE,
      ),
    ),
    'module' => 'commerce_discount_firsttime',
    'group' => t('Commerce Order'),
    'callbacks' => array(
      'execute' => $inline_conditions['commerce_order_first_time']['callbacks']['build'],
    ),
  );

  return $conditions;
}
