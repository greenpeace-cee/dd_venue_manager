<?php
return [
  [
    'name' => 'OptionValue_virtual_meeting',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'encounter_medium',
        'label' => 'Virtual Meeting',
        'value' => '6',
        'name' => 'virtual_meeting',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'weight' => 6,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => TRUE,
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
