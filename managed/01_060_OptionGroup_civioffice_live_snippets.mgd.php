<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_civioffice_live_snippets',
    'entity' => 'OptionGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'civioffice_live_snippets',
        'title' => 'CiviOffice Live Snippets',
        'description' => NULL,
        'data_type' => NULL,
        'is_reserved' => TRUE,
        'is_active' => TRUE,
        'is_locked' => FALSE,
        'option_value_fields' => [
          'name',
          'label',
          'description',
        ],
      ],
    ],
  ],
];
