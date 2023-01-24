<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Ongoing_Kooperation',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Ongoing_Kooperation',
        'label' => 'Ongoing Kooperation',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Contact',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'display_name',
            'Contact_CaseContact_Case_01.subject',
          ],
          'orderBy' => [],
          'where' => [
            [
              'Contact_CaseContact_Case_01.status_id:name',
              '=',
              'Open',
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Case AS Contact_CaseContact_Case_01',
              'INNER',
              'CaseContact',
              [
                'id',
                '=',
                'Contact_CaseContact_Case_01.contact_id',
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
    'name' => 'SavedSearch_Ongoing_Kooperation_Group_Ongoing_Kooperation_7',
    'entity' => 'Group',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Ongoing_Kooperation_7',
        'title' => 'Ongoing Kooperation',
        'description' => NULL,
        'source' => NULL,
        'saved_search_id.name' => 'Ongoing_Kooperation',
        'is_active' => TRUE,
        'visibility' => 'User and User Admin Only',
        'group_type:name' => [
          'Mailing List',
        ],
        'parents' => NULL,
        'children' => NULL,
        'is_hidden' => FALSE,
        'is_reserved' => FALSE,
        'frontend_title' => NULL,
        'frontend_description' => NULL,
      ],
    ],
  ],
];
