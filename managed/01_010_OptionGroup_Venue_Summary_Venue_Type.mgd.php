<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type',
    'entity' => 'OptionGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Summary_Venue_Type',
        'title' => 'Venue Summary :: Venue Type',
        'description' => NULL,
        'data_type' => 'Int',
        'is_reserved' => FALSE,
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
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type_OptionValue_Mall',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Summary_Venue_Type',
        'label' => 'Mall',
        'value' => '1',
        'name' => 'Mall',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type_OptionValue_Kooperation',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Summary_Venue_Type',
        'label' => 'Kooperation',
        'value' => '2',
        'name' => 'Kooperation',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type_OptionValue_Event',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Summary_Venue_Type',
        'label' => 'Event',
        'value' => '3',
        'name' => 'Event',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type_OptionValue_Public_Venue',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Summary_Venue_Type',
        'label' => 'Public Venue',
        'value' => '4',
        'name' => 'Public_Venue',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Summary_Venue_Type_OptionValue_sonstige',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Summary_Venue_Type',
        'label' => 'sonstige',
        'value' => '5',
        'name' => 'sonstige',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
];
