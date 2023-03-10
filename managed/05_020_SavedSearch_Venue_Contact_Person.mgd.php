<?php
return [
  [
    'name' => 'SavedSearch_Venue_Contact_Person',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Contact_Person',
        'label' => 'Venue Contact Person',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'RelationshipCache',
        'api_params' => [
          'version' => 4,
          'select' => [
            'far_contact_id.display_name',
            'near_contact_id.display_name',
            'RelationshipCache_Contact_far_contact_id_01.phone_primary.phone',
            'RelationshipCache_Contact_far_contact_id_01.email_primary.email',
            'Venue_Contact_Person_Details.Primary:label',
            'Venue_Contact_Person_Details.Position',
            'Venue_Contact_Person_Details.Decision_Maker:label',
            'Venue_Contact_Person_Details.DDC_Disposition:label',
            'Venue_Contact_Person_Details.On_Site_Contact:label',
            'RelationshipCache_Contact_far_contact_id_01.display_name',
          ],
          'orderBy' => [],
          'where' => [
            [
              'relationship_type_id',
              '=',
              '21',
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
            [
              'Contact AS RelationshipCache_Contact_far_contact_id_01',
              'LEFT',
              [
                'far_contact_id',
                '=',
                'RelationshipCache_Contact_far_contact_id_01.id',
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
    'name' => 'SavedSearch_Venue_Contact_Person_SearchDisplay_Venue_Contact_Person_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Contact_Person_Table',
        'label' => 'Venue_Contact_Person_Table',
        'saved_search_id.name' => 'Venue_Contact_Person',
        'type' => 'table',
        'settings' => [
          'description' => '',
          'sort' => [],
          'limit' => 0,
          'pager' => FALSE,
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'far_contact_id.display_name',
              'dataType' => 'String',
              'label' => 'Name',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'far_contact_id',
                'target' => '_blank',
              ],
              'title' => 'View Contact',
            ],
            [
              'type' => 'field',
              'key' => 'RelationshipCache_Contact_far_contact_id_01.phone_primary.phone',
              'dataType' => 'String',
              'label' => 'Phone',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'RelationshipCache_Contact_far_contact_id_01.email_primary.email',
              'dataType' => 'String',
              'label' => 'Email',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Contact_Person_Details.Primary:label',
              'dataType' => 'Boolean',
              'label' => 'Primary?',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Contact_Person_Details.Position',
              'dataType' => 'String',
              'label' => 'Position',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Contact_Person_Details.Decision_Maker:label',
              'dataType' => 'Boolean',
              'label' => 'Decision Maker',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Contact_Person_Details.DDC_Disposition:label',
              'dataType' => 'Integer',
              'label' => 'DDC Disposition',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Contact_Person_Details.On_Site_Contact:label',
              'dataType' => 'Integer',
              'label' => 'On-Site Contact',
              'sortable' => TRUE,
            ],
          ],
          'actions' => FALSE,
          'classes' => [
            'table-striped',
            'table',
          ],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];