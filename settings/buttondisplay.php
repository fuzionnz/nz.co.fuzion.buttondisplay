<?php

use CRM_Buttondisplay_ExtensionUtil as E;

$settings = [];
$weight = 0;

$contribution_pages = civicrm_api3('ContributionPage', 'get', [
  'option.limit' => 0,
]);

foreach ($contribution_pages['values'] as $id => $p) {
  $settings['button_display_page_id_' . $id] = [
    'name' => 'button_display_page_id_' . $id,
    'type' => 'String',
    'default' => 0,
    'html_type' => 'yesno',
    'add' => '1.0',
    'title' => E::ts('Display buttons instead of radio and checkbox fields for: %1', [1 => $p['title']]),
    'is_domain' => 1,
    'is_contact' => 0,
    'settings_pages' => [
      'recurringbuttons' => [
        'weight' => $weight++,
      ],
    ],
  ];
}

return $settings;
