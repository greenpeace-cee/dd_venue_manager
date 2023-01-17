<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Bookings',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Bookings',
        'label' => 'Bookings',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Activity',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'activity_date_time',
            'subject',
            'activity_type_id:label',
            'details',
            'status_id:label',
            'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.id',
            'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.display_name',
          ],
          'orderBy' => [],
          'where' => [
            [
              'activity_type_id:name',
              'IN',
              [
                'Booking Request',
                'Booking Coordination',
                'Booking Confirmation',
                'Booking Adjustment',
                'Booking Cancellation',
              ],
            ],
            [
              'Activity_CaseActivity_Case_01.case_type_id:name',
              '=',
              'cooperation',
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Case AS Activity_CaseActivity_Case_01',
              'LEFT',
              'CaseActivity',
              [
                'id',
                '=',
                'Activity_CaseActivity_Case_01.activity_id',
              ],
            ],
            [
              'Contact AS Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01',
              'LEFT',
              'CaseContact',
              [
                'Activity_CaseActivity_Case_01.id',
                '=',
                'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.case_id',
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
    'name' => 'SavedSearch_Bookings_SearchDisplay_Bookings_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Bookings_Table',
        'label' => 'Bookings Table',
        'saved_search_id.name' => 'Bookings',
        'type' => 'table',
        'settings' => [
          'actions' => FALSE,
          'limit' => '50',
          'classes' => [
            'table',
            'table-striped',
          ],
          'pager' => [
            'expose_limit' => FALSE,
            'show_count' => FALSE,
          ],
          'placeholder' => 5,
          'sort' => [
            [
              'activity_date_time',
              'DESC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'activity_date_time',
              'dataType' => 'Timestamp',
              'label' => 'Activity Date',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'subject',
              'dataType' => 'String',
              'label' => 'Subject',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'activity_type_id:label',
              'dataType' => 'Integer',
              'label' => 'Activity Type',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'details',
              'dataType' => 'Text',
              'label' => 'Details',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'status_id:label',
              'dataType' => 'Integer',
              'label' => 'Status',
              'sortable' => TRUE,
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'entity' => 'Activity',
                  'action' => 'view',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-external-link',
                  'text' => 'View',
                  'style' => 'default',
                  'path' => '',
                  'condition' => [],
                ],
                [
                  'entity' => 'Activity',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => 'Edit',
                  'style' => 'default',
                  'path' => '',
                  'condition' => [],
                ],
                [
                  'entity' => 'Activity',
                  'action' => 'delete',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-trash',
                  'text' => 'Delete',
                  'style' => 'danger',
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
