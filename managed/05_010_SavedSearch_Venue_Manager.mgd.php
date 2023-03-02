<?php
return [
  [
    'name' => 'SavedSearch_Venue_Manager',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Manager',
        'label' => 'Venue Manager',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'RelationshipCache',
        'api_params' => [
          'version' => 4,
          'select' => [
            'far_contact_id.display_name',
            'near_contact_id.display_name',
            'near_relation:label',
          ],
          'orderBy' => [],
          'where' => [
            [
              'relationship_type_id',
              'IN',
              [
                '19',
                '20',
              ],
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Case AS RelationshipCache_Case_case_id_01',
              'INNER',
              [
                'case_id',
                '=',
                'RelationshipCache_Case_case_id_01.id',
              ],
            ],
            [
              'Contact AS RelationshipCache_Case_case_id_01_Case_CaseContact_Contact_01',
              'INNER',
              'CaseContact',
              [
                'RelationshipCache_Case_case_id_01.id',
                '=',
                'RelationshipCache_Case_case_id_01_Case_CaseContact_Contact_01.case_id',
              ],
            ],
          ],
          'having' => [],
        ],
        'expires_date' => NULL,
        'description' => NULL,
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_Venue_Manager_SearchDisplay_Venue_Manager_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Manager_Table',
        'label' => 'Venue Manager Table',
        'saved_search_id.name' => 'Venue_Manager',
        'type' => 'table',
        'settings' => [
          'actions' => FALSE,
          'limit' => 0,
          'classes' => [
            'table',
          ],
          'pager' => FALSE,
          'placeholder' => 2,
          'sort' => [
            [
              'relationship_type_id',
              'ASC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'near_relation:label',
              'dataType' => 'String',
              'label' => '',
              'sortable' => FALSE,
              'cssRules' => [
                [
                  'bg-success',
                  'near_relation:label',
                  '=',
                  'has venue officer',
                ],
                [
                  'bg-info',
                  'near_relation:label',
                  '=',
                  'has coordinator',
                ],
                [
                  'bg-warning',
                  'near_relation:label',
                  '=',
                  'has venue officer contact person',
                ],
                [
                  'bg-danger',
                  'near_relation:label',
                  '=',
                  'has venue coordinator contact person',
                ],
              ],
            ],
            [
              'type' => 'field',
              'key' => 'far_contact_id.display_name',
              'dataType' => 'String',
              'label' => '',
              'sortable' => FALSE,
              'cssRules' => [
                [
                  'bg-success',
                  'near_relation:label',
                  '=',
                  'has venue officer',
                ],
                [
                  'bg-info',
                  'near_relation:label',
                  '=',
                  'has coordinator',
                ],
                [
                  'bg-warning',
                  'near_relation:label',
                  '=',
                  'has venue officer contact person',
                ],
                [
                  'bg-danger',
                  'near_relation:label',
                  '=',
                  'has venue coordinator contact person',
                ],
              ],
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
          'noResultsText' => 'No Venue Managers added',
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
