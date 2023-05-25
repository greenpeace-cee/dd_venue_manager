<?php
return [
  [
    'name' => 'SavedSearch_Venue_Recent_Bookings',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Recent_Bookings',
        'label' => 'Venue Recent Bookings',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Activity',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'subject',
            'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.display_name',
            'Booking_Details.Category:label',
            'Booking_Details.Topic',
            'Booking_Details.Working_Days',
            'Booking_Details.Working_Times',
            'Booking_Details.Setup_Times',
            'Booking_Details.Registration_on_Site',
            'Booking_Details.Engagement_Campaign:label',
            'Booking_Details.Pavillon:label',
            'Booking_Details.Round_Desk:label',
            'Booking_Details.Beachflag:label',
            'Booking_Details.VR_Glasses:label',
            'Booking_Details.Storage_Available:label',
            'Booking_Details.Other_Equipment',
          ],
          'orderBy' => [],
          'where' => [
            [
              'activity_type_id:name',
              '=',
              'Booking Confirmation',
            ],
            [
              'activity_date_time',
              'BETWEEN',
              [
                'ending.month',
                'starting.month',
              ],
            ],
          ],
          'groupBy' => [],
          'join' => [
            [
              'Case AS Activity_CaseActivity_Case_01',
              'INNER',
              'CaseActivity',
              [
                'id',
                '=',
                'Activity_CaseActivity_Case_01.activity_id',
              ],
            ],
            [
              'Contact AS Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01',
              'INNER',
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
    'name' => 'SavedSearch_Venue_Recent_Bookings_SearchDisplay_Recent_Bookings_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Recent_Bookings_Table',
        'label' => 'Venue Recent Bookings Table',
        'saved_search_id.name' => 'Venue_Recent_Bookings',
        'type' => 'table',
        'settings' => [
          'description' => NULL,
          'sort' => [
            [
              'activity_date_time',
              'ASC',
            ],
            [
              'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.display_name',
              'ASC',
            ],
          ],
          'limit' => 50,
          'pager' => [],
          'placeholder' => 10,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'subject',
              'dataType' => 'String',
              'label' => 'Subject',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01.display_name',
              'dataType' => 'String',
              'label' => 'Venue',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'Activity_CaseActivity_Case_01_Case_CaseContact_Contact_01',
                'target' => '_blank',
              ],
              'title' => 'View Contact',
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Category:label',
              'dataType' => 'Integer',
              'label' => 'Category',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Topic',
              'dataType' => 'String',
              'label' => 'Topic',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Working_Days',
              'dataType' => 'String',
              'label' => 'Working Days',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Working_Times',
              'dataType' => 'String',
              'label' => 'Working Times',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Setup_Times',
              'dataType' => 'String',
              'label' => 'Setup Times',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Booking_Details.Registration_on_Site',
              'dataType' => 'Text',
              'label' => 'Registration on Site',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'size' => 'btn-xs',
              'links' => [
                [
                  'path' => '/civicrm/dd-venue-manager/create-case-activity-civi-office-document?activity_id=[id]',
                  'icon' => 'fa-external-link',
                  'text' => 'Export',
                  'style' => 'success',
                  'condition' => [],
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => '_blank',
                ],
                [
                  'entity' => 'Activity',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => 'Edit',
                  'style' => 'info',
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
          'actions' => TRUE,
          'classes' => [
            'table',
            'table-striped',
          ],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
