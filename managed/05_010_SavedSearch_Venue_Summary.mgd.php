<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Venue_Summary',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Summary',
        'label' => 'Venue Summary',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Contact',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'Venue_Summary.Company_Overview',
            'Venue_Summary.Venue_Type:label',
          ],
          'orderBy' => [],
          'where' => [
            [
              'contact_type:name',
              '=',
              'Organization',
            ],
            [
              'contact_sub_type:name',
              '=',
              'Venue',
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
    'name' => 'SavedSearch_Venue_Summary_SearchDisplay_Venue_Summary_Grid_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Summary_Grid_1',
        'label' => 'Venue Summary',
        'saved_search_id.name' => 'Venue_Summary',
        'type' => 'grid',
        'settings' => [
          'colno' => '3',
          'limit' => '50',
          'sort' => [
            [
              'sort_name',
              'ASC',
            ],
          ],
          'pager' => FALSE,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'Venue_Summary.Company_Overview',
              'dataType' => 'Text',
              'label' => 'Company Overview',
              'empty_value' => 'None',
              'forceLabel' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Summary.Venue_Type:label',
              'dataType' => 'Integer',
              'label' => 'Venue Type',
              'empty_value' => 'None',
              'forceLabel' => TRUE,
              'editable' => TRUE,
              'break' => TRUE,
            ],
          ],
          'placeholder' => 5,
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
