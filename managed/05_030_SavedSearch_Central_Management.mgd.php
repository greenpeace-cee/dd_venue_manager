<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Central_Management',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Central_Management',
        'label' => 'Central Management',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'RelationshipCache',
        'api_params' => [
          'version' => 4,
          'select' => [
            'near_contact_id.display_name',
            'far_contact_id.display_name',
            'near_contact_id',
            'far_contact_id',
          ],
          'orderBy' => [],
          'where' => [
            [
              'relationship_type_id',
              '=',
              '19',
            ],
          ],
          'groupBy' => [],
          'join' => [],
          'having' => [],
        ],
        'expires_date' => NULL,
        'description' => NULL,
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_Central_Management_SearchDisplay_Central_Management_Grid_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Central_Management_Grid_1',
        'label' => 'Central Management Grid',
        'saved_search_id.name' => 'Central_Management',
        'type' => 'grid',
        'settings' => [
          'colno' => '3',
          'limit' => 0,
          'sort' => [],
          'pager' => FALSE,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'far_contact_id.display_name',
              'dataType' => 'String',
              'rewrite' => 'is centrally managed by [far_contact_id.display_name]',
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'far_contact_id',
                'target' => '_blank',
              ],
              'title' => NULL,
            ],
          ],
          'placeholder' => 1,
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
