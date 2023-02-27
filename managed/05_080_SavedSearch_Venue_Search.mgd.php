<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Venue_Search',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'never',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Search',
        'label' => 'Venue Search',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Contact',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'display_name',
            'GROUP_CONCAT(DISTINCT Contact_Email_contact_id_01.email) AS GROUP_CONCAT_Contact_Email_contact_id_01_email',
            'GROUP_CONCAT(DISTINCT Contact_Phone_contact_id_01.phone) AS GROUP_CONCAT_Contact_Phone_contact_id_01_phone',
            'GROUP_CONCAT(DISTINCT Contact_Address_contact_id_01.street_address) AS GROUP_CONCAT_Contact_Address_contact_id_01_street_address',
            'GROUP_CONCAT(DISTINCT Contact_Address_contact_id_01.postal_code) AS GROUP_CONCAT_Contact_Address_contact_id_01_postal_code',
            'GROUP_CONCAT(DISTINCT Contact_Address_contact_id_01.city) AS GROUP_CONCAT_Contact_Address_contact_id_01_city',
            'Venue_Summary.Venue_Type:label',
            'GROUP_CONCAT(DISTINCT Contact_CaseContact_Case_01.status_id:label) AS GROUP_CONCAT_Contact_CaseContact_Case_01_status_id_label',
            'GROUP_CONCAT(DISTINCT Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01.subject) AS GROUP_CONCAT_Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01_subject',
            'MAX(Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01.activity_date_time) AS MAX_Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01_activity_date_time',
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
          'groupBy' => [
            'id',
          ],
          'join' => [
            [
              'Case AS Contact_CaseContact_Case_01',
              'LEFT',
              'CaseContact',
              [
                'id',
                '=',
                'Contact_CaseContact_Case_01.contact_id',
              ],
            ],
            [
              'Email AS Contact_Email_contact_id_01',
              'LEFT',
              [
                'id',
                '=',
                'Contact_Email_contact_id_01.contact_id',
              ],
              [
                'Contact_Email_contact_id_01.is_primary',
                '=',
                TRUE,
              ],
            ],
            [
              'Phone AS Contact_Phone_contact_id_01',
              'LEFT',
              [
                'id',
                '=',
                'Contact_Phone_contact_id_01.contact_id',
              ],
              [
                'Contact_Phone_contact_id_01.is_primary',
                '=',
                TRUE,
              ],
            ],
            [
              'Address AS Contact_Address_contact_id_01',
              'LEFT',
              [
                'id',
                '=',
                'Contact_Address_contact_id_01.contact_id',
              ],
              [
                'Contact_Address_contact_id_01.is_primary',
                '=',
                TRUE,
              ],
            ],
            [
              'Activity AS Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01',
              'LEFT',
              'CaseActivity',
              [
                'Contact_CaseContact_Case_01.id',
                '=',
                'Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01.case_id',
              ],
              [
                'Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01.status_id:name',
                '=',
                '"Completed"',
              ],
              [
                'Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01.activity_type_id:name',
                'IN',
                [
                  'Phone Call',
                  'Personal Email',
                  'Meeting',
                  'Request',
                ],
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
    'name' => 'SavedSearch_Venue_Search_SearchDisplay_Venue_Search_Table',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'never',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Search_Table',
        'label' => 'Venue Search Table',
        'saved_search_id.name' => 'Venue_Search',
        'type' => 'table',
        'settings' => [
          'actions' => TRUE,
          'limit' => '50',
          'classes' => [
            'table',
            'table-striped',
          ],
          'pager' => [],
          'placeholder' => 50,
          'sort' => [
            [
              'sort_name',
              'ASC',
            ],
            [
              'display_name',
              'ASC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'Venue_Summary.Venue_Type:label',
              'dataType' => 'Integer',
              'label' => 'Venue Type',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'display_name',
              'dataType' => 'String',
              'label' => 'Display Name',
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => '',
                'target' => '_blank',
              ],
              'title' => 'View Contact',
            ],
            [
              'type' => 'field',
              'key' => 'GROUP_CONCAT_Contact_Email_contact_id_01_email',
              'dataType' => 'String',
              'label' => 'Email',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'GROUP_CONCAT_Contact_Phone_contact_id_01_phone',
              'dataType' => 'String',
              'label' => 'Phone',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'GROUP_CONCAT_Contact_CaseContact_Case_01_status_id_label',
              'dataType' => 'Integer',
              'label' => 'Case Status',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'GROUP_CONCAT_Contact_Address_contact_id_01_street_address',
              'dataType' => 'String',
              'label' => 'Address',
              'sortable' => TRUE,
              'rewrite' => '[GROUP_CONCAT_Contact_Address_contact_id_01_street_address], [GROUP_CONCAT_Contact_Address_contact_id_01_postal_code] [GROUP_CONCAT_Contact_Address_contact_id_01_city]',
            ],
            [
              'type' => 'field',
              'key' => 'MAX_Contact_CaseContact_Case_01_Case_CaseActivity_Activity_01_activity_date_time',
              'dataType' => 'Timestamp',
              'label' => 'Last Contacted',
              'sortable' => TRUE,
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'entity' => 'Contact',
                  'action' => 'view',
                  'join' => '',
                  'target' => '',
                  'icon' => 'fa-address-book-o',
                  'text' => 'View Venue',
                  'style' => 'primary',
                  'path' => '',
                  'condition' => [],
                ],
                [
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => '',
                  'icon' => 'fa-folder-open-o',
                  'text' => 'Manage Case',
                  'style' => 'success',
                  'path' => 'civicrm/contact/view/case?reset=1&id=[Contact_CaseContact_Case_01.id]&cid=[id]&action=view&context=case&selectedChild=case',
                  'condition' => [
                    'GROUP_CONCAT_Contact_CaseContact_Case_01_status_id_label',
                    'IS NOT EMPTY',
                  ],
                ],
                [
                  'path' => 'civicrm/case/add?reset=1&action=add&cid=[id]&context=case',
                  'icon' => 'fa-plus-square-o',
                  'text' => 'Create Case',
                  'style' => 'warning',
                  'condition' => [
                    'GROUP_CONCAT_Contact_CaseContact_Case_01_status_id_label',
                    'IS EMPTY',
                  ],
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => '',
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