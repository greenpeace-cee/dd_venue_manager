<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Cooperation_ToDo',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Cooperation_ToDo',
        'label' => 'Cooperation ToDo',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Case',
        'api_params' => [
          'version' => 4,
          'select' => [
            'Case_CaseContact_Contact_01.display_name',
            'Case_CaseActivity_Activity_01.activity_date_time',
            'Case_CaseActivity_Activity_01.activity_type_id:label',
            'Case_CaseActivity_Activity_01.subject',
            'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_01.display_name',
            'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02.display_name',
            'Case_CaseActivity_Activity_01.created_date',
            'Case_CaseActivity_Activity_01.details',
          ],
          'orderBy' => [],
          'where' => [
            [
              'case_type_id:name',
              '=',
              'cooperation',
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Activity AS Case_CaseActivity_Activity_01',
              'INNER',
              'CaseActivity',
              [
                'id',
                '=',
                'Case_CaseActivity_Activity_01.case_id',
              ],
              [
                'Case_CaseActivity_Activity_01.status_id:name',
                '=',
                '"Scheduled"',
              ],
            ],
            [
              'Contact AS Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_01',
              'INNER',
              'ActivityContact',
              [
                'Case_CaseActivity_Activity_01.id',
                '=',
                'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_01.activity_id',
              ],
              [
                'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_01.record_type_id:name',
                '=',
                '"Activity Assignees"',
              ],
            ],
            [
              'Contact AS Case_CaseContact_Contact_01',
              'INNER',
              'CaseContact',
              [
                'id',
                '=',
                'Case_CaseContact_Contact_01.case_id',
              ],
            ],
            [
              'Contact AS Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02',
              'LEFT',
              'ActivityContact',
              [
                'Case_CaseActivity_Activity_01.id',
                '=',
                'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02.activity_id',
              ],
              [
                'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02.record_type_id:name',
                '=',
                '"Activity Source"',
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
    'name' => 'SavedSearch_Cooperation_ToDo_SearchDisplay_Cooperation_ToDo_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Cooperation_ToDo_Table',
        'label' => 'Cooperation ToDo Table',
        'saved_search_id.name' => 'Cooperation_ToDo',
        'type' => 'table',
        'settings' => [
          'actions' => FALSE,
          'limit' => '50',
          'classes' => [
            'table',
            'table-striped',
          ],
          'pager' => [
            'show_count' => TRUE,
            'expose_limit' => FALSE,
          ],
          'placeholder' => 5,
          'sort' => [
            [
              'Case_CaseActivity_Activity_01.activity_date_time',
              'ASC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'Case_CaseContact_Contact_01.display_name',
              'dataType' => 'String',
              'label' => 'Venue',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'Case_CaseContact_Contact_01',
                'target' => '_blank',
              ],
              'title' => 'View Case Clients',
            ],
            [
              'type' => 'field',
              'key' => 'Case_CaseActivity_Activity_01.activity_date_time',
              'dataType' => 'Timestamp',
              'label' => 'Date',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Case_CaseActivity_Activity_01.activity_type_id:label',
              'dataType' => 'Integer',
              'label' => 'Activity Type',
              'sortable' => TRUE,
              'icons' => [
                [
                  'side' => 'left',
                  'icon' => 'fa-question-circle-o',
                  'if' => [
                    'Case_CaseActivity_Activity_01.activity_type_id:name',
                    '=',
                    'Booking Request',
                  ],
                ],
                [
                  'icon' => 'fa-calendar-plus-o',
                  'side' => 'left',
                  'if' => [
                    'Case_CaseActivity_Activity_01.activity_type_id:name',
                    '=',
                    'Booking Confirmation',
                  ],
                ],
                [
                  'icon' => 'fa-share-square-o',
                  'side' => 'left',
                  'if' => [
                    'Case_CaseActivity_Activity_01.activity_type_id:label',
                    '=',
                    'Follow up',
                  ],
                ],
              ],
            ],
            [
              'type' => 'field',
              'key' => 'Case_CaseActivity_Activity_01.subject',
              'dataType' => 'String',
              'label' => 'Subject',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02.display_name',
              'dataType' => 'String',
              'label' => 'Added By',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02',
                'target' => '_blank',
              ],
              'title' => 'View Case Activities - Activity Contacts 2',
              'rewrite' => '[Case_CaseActivity_Activity_01_Activity_ActivityContact_Contact_02.display_name] on [Case_CaseActivity_Activity_01.created_date]',
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'entity' => 'Activity',
                  'action' => 'update',
                  'join' => 'Case_CaseActivity_Activity_01',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => 'Edit',
                  'style' => 'primary',
                  'path' => '',
                  'condition' => [],
                ],
              ],
              'type' => 'buttons',
              'alignment' => 'text-right',
            ],
          ],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
