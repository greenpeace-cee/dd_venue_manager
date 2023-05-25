<?php
return [
  [
    'name' => 'Navigation_Venues',
    'entity' => 'Navigation',
    'cleanup' => 'always',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'domain_id' => 'current_domain',
        'label' => 'Venues',
        'name' => 'Venues',
        'url' => NULL,
        'icon' => 'crm-i fa-building-o',
        'permission' => 'manage venue',
        'permission_operator' => '',
        'parent_id' => NULL,
        'is_active' => TRUE,
        'has_separator' => NULL,
        'weight' => 11,
      ],
    ],
  ],
  [
    'name' => 'Navigation_Venues_Search',
    'entity' => 'Navigation',
    'cleanup' => 'always',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'domain_id' => 'current_domain',
        'label' => 'Search Venues',
        'name' => 'Search Venues',
        'url' => 'civicrm/venue-search',
        'icon' => 'crm-i fa-search',
        'permission' => 'manage venue',
        'permission_operator' => '',
        'parent_id.name' => 'Venues',
        'is_active' => TRUE,
        'has_separator' => NULL,
        'weight' => 40,
      ],
    ],
  ],
  [
    'name' => 'Navigation_Venues_New',
    'entity' => 'Navigation',
    'cleanup' => 'always',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'domain_id' => 'current_domain',
        'label' => 'New Venue',
        'name' => 'New Venue',
        'url' => 'civicrm/contact/add?ct=Organization&cst=Venue&reset=1',
        'icon' => 'crm-i fa-plus-square-o',
        'permission' => 'manage venue',
        'permission_operator' => '',
        'parent_id.name' => 'Venues',
        'is_active' => TRUE,
        'has_separator' => 1,
        'weight' => 41,
      ],
    ],
  ],
];
