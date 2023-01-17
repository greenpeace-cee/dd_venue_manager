<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Venue_Contact_Person',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
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
            'near_relation:label',
            'far_contact_id.display_name',
            'Venue_Officer_Contact_Person_Detail.Primary_:label',
            'Venue_Officer_Contact_Person_Detail.Position',
            'Venue_Officer_Contact_Person_Detail.DDC_Disposition:label',
            'Venue_Officer_Contact_Person_Detail.Decision_Maker:label',
            'description',
          ],
          'orderBy' => [],
          'where' => [
            [
              'relationship_type_id',
              'IN',
              [
                '20',
                '21',
              ],
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Case AS RelationshipCache_Case_case_id_01',
              'LEFT',
              [
                'case_id',
                '=',
                'RelationshipCache_Case_case_id_01.id',
              ],
            ],
            [
              'Contact AS RelationshipCache_Case_case_id_01_Case_CaseContact_Contact_01',
              'LEFT',
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
    'name' => 'SavedSearch_Venue_Contact_Person_SearchDisplay_Venue_Contact_Person_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Contact_Person_Table',
        'label' => 'Venue Contact Person Table',
        'saved_search_id.name' => 'Venue_Contact_Person',
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
            [
              'Venue_Officer_Contact_Person_Detail.Primary_:label',
              'DESC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'near_relation:label',
              'dataType' => 'String',
              'label' => '',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'far_contact_id.display_name',
              'dataType' => 'String',
              'label' => 'Contact',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'far_contact_id',
                'target' => '_blank',
              ],
              'title' => NULL,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Officer_Contact_Person_Detail.Primary_:label',
              'dataType' => 'Boolean',
              'label' => 'Primary?',
              'sortable' => TRUE,
              'icons' => [],
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Officer_Contact_Person_Detail.Position',
              'dataType' => 'String',
              'label' => 'Position',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Officer_Contact_Person_Detail.DDC_Disposition:label',
              'dataType' => 'Integer',
              'label' => 'DDC Disposition',
              'sortable' => TRUE,
              'cssRules' => [],
              'icons' => [],
            ],
            [
              'type' => 'field',
              'key' => 'Venue_Officer_Contact_Person_Detail.Decision_Maker:label',
              'dataType' => 'Boolean',
              'label' => 'Decision Maker',
              'sortable' => TRUE,
              'cssRules' => [],
            ],
            [
              'type' => 'field',
              'key' => 'description',
              'dataType' => 'String',
              'label' => '',
              'sortable' => FALSE,
              'editable' => TRUE,
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'entity' => 'Relationship',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => '',
                  'style' => 'default',
                  'path' => '',
                  'condition' => [],
                ],
              ],
              'type' => 'buttons',
              'alignment' => 'text-right',
            ],
          ],
          'cssRules' => [
            [
              'bg-info',
              'relationship_type_id',
              '=',
              '21',
            ],
            [
              'bg-success',
              'relationship_type_id',
              '=',
              '20',
            ],
          ],
          'noResultsText' => 'No Venue Contacts added',
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
