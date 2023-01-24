<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Venue',
    'entity' => 'ContactType',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue',
        'label' => 'Venue',
        'description' => NULL,
        'image_URL' => NULL,
        'icon' => NULL,
        'parent_id.name' => 'Organization',
        'is_active' => TRUE,
        'is_reserved' => FALSE,
      ],
    ],
  ],
];
