<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_Booking_Details_Topic',
    'entity' => 'OptionGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Booking_Details_Topic',
        'title' => 'Booking Details :: Topic',
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
    'name' => 'OptionGroup_Booking_Details_Topic_OptionValue_Plastic',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Booking_Details_Topic',
        'label' => 'Plastic',
        'value' => '1',
        'name' => 'Plastic',
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
    'name' => 'OptionGroup_Booking_Details_Topic_OptionValue_Oceans',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Booking_Details_Topic',
        'label' => 'Oceans',
        'value' => '2',
        'name' => 'Oceans',
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
