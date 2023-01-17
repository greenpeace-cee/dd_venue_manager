<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Cooperation',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Cooperation',
        'label' => 'Cooperation',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Case',
        'api_params' => [
          'version' => 4,
          'select' => [
            'status_id:label',
            'MAX(Case_CaseActivity_Activity_01.activity_date_time) AS MAX_Case_CaseActivity_Activity_01_activity_date_time',
            'MAX(Case_CaseActivity_Activity_02.activity_date_time) AS MAX_Case_CaseActivity_Activity_02_activity_date_time',
            'MAX(Case_CaseActivity_Activity_01.id) AS MAX_Case_CaseActivity_Activity_01_id',
            'MAX(Case_CaseActivity_Activity_02.id) AS MAX_Case_CaseActivity_Activity_02_id',
          ],
          'orderBy' => [],
          'where' => [
            [
              'case_type_id:name',
              '=',
              'cooperation',
            ],
          ],
          'groupBy' => [
            'id',
          ],
          'join' => [
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
              'Activity AS Case_CaseActivity_Activity_01',
              'LEFT',
              'CaseActivity',
              [
                'id',
                '=',
                'Case_CaseActivity_Activity_01.case_id',
              ],
              [
                'Case_CaseActivity_Activity_01.activity_type_id:name',
                '=',
                '"Booking Confirmation"',
              ],
            ],
            [
              'Activity AS Case_CaseActivity_Activity_02',
              'LEFT',
              'CaseActivity',
              [
                'id',
                '=',
                'Case_CaseActivity_Activity_02.case_id',
              ],
              [
                'Case_CaseActivity_Activity_02.activity_type_id:name',
                '=',
                '"Booking Request"',
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
    'name' => 'SavedSearch_Cooperation_SearchDisplay_Cooperation_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Cooperation_Table_1',
        'label' => 'Cooperation Table',
        'saved_search_id.name' => 'Cooperation',
        'type' => 'table',
        'settings' => [
          'actions' => FALSE,
          'limit' => '50',
          'classes' => [
            'table',
          ],
          'pager' => FALSE,
          'placeholder' => 1,
          'sort' => [],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'status_id:label',
              'dataType' => 'Integer',
              'label' => 'Case Status',
              'sortable' => FALSE,
            ],
            [
              'type' => 'field',
              'key' => 'MAX_Case_CaseActivity_Activity_01_activity_date_time',
              'dataType' => 'Timestamp',
              'label' => 'Most Recent Booking Confirmation',
              'sortable' => TRUE,
              'link' => [
                'path' => 'civicrm/case/activity?reset=1&cid=[Case_CaseContact_Contact_01.id]&caseid=[id]&id=[MAX_Case_CaseActivity_Activity_01_id]&action=update',
                'entity' => '',
                'action' => '',
                'join' => '',
                'target' => 'crm-popup',
              ],
              'icons' => [
                [
                  'icon' => 'fa-calendar-check-o',
                  'side' => 'left',
                  'if' => [
                    'MAX_Case_CaseActivity_Activity_01_activity_date_time',
                    'IS NOT EMPTY',
                  ],
                ],
              ],
            ],
            [
              'type' => 'field',
              'key' => 'MAX_Case_CaseActivity_Activity_02_activity_date_time',
              'dataType' => 'Timestamp',
              'label' => 'Most Recent Booking Request',
              'sortable' => TRUE,
              'link' => [
                'path' => 'civicrm/case/activity?reset=1&cid=[Case_CaseContact_Contact_01.id]&caseid=[id]&id=[MAX_Case_CaseActivity_Activity_02_id]&action=update',
                'entity' => '',
                'action' => '',
                'join' => '',
                'target' => 'crm-popup',
              ],
              'icons' => [
                [
                  'icon' => 'fa-question-circle-o',
                  'side' => 'left',
                  'if' => [
                    'MAX_Case_CaseActivity_Activity_02_activity_date_time',
                    'IS NOT EMPTY',
                  ],
                ],
              ],
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'path' => '/civicrm/contact/view/case?reset=1&id=[id]&cid=[Case_CaseContact_Contact_01.id]&action=view&context=case&selectedChild=case',
                  'icon' => 'fa-external-link',
                  'text' => 'Manage',
                  'style' => 'primary',
                  'condition' => [],
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => '_blank',
                ],
              ],
              'type' => 'buttons',
              'alignment' => 'text-right',
            ],
          ],
          'noResultsText' => 'No Cooperation Found',
          'cssRules' => [],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
