<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'ContactType_Venue_Contact_Person',
    'entity' => 'ContactType',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Contact_Person',
        'label' => 'Venue Contact Person',
        'description' => NULL,
        'image_URL' => NULL,
        'icon' => NULL,
        'parent_id.name' => 'Individual',
        'is_active' => TRUE,
        'is_reserved' => FALSE,
      ],
    ],
  ],
];
