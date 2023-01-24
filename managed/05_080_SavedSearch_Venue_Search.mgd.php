<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Venue_Search',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'always',
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
            'Contact_Email_contact_id_01.email',
            'Contact_Phone_contact_id_01.phone',
            'Contact_Address_contact_id_01.street_address',
            'Contact_Address_contact_id_01.postal_code',
            'Contact_Address_contact_id_01.city',
            'Venue_Summary.Venue_Type:label',
            'Contact_CaseContact_Case_01.status_id:label',
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
              [
                'Contact_CaseContact_Case_01.case_type_id:name',
                '=',
                '"cooperation"',
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
    'update' => 'always',
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
              'sortable' => FALSE,
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
              'key' => 'Contact_Email_contact_id_01.email',
              'dataType' => 'String',
              'label' => 'Email',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Contact_Phone_contact_id_01.phone',
              'dataType' => 'String',
              'label' => 'Phone',
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'Contact_Address_contact_id_01.street_address',
              'dataType' => 'String',
              'label' => 'Address',
              'sortable' => TRUE,
              'rewrite' => '[Contact_Address_contact_id_01.street_address] [Contact_Address_contact_id_01.postal_code] [Contact_Address_contact_id_01.city]',
            ],
            [
              'type' => 'field',
              'key' => 'Contact_CaseContact_Case_01.status_id:label',
              'dataType' => 'Integer',
              'label' => 'Case Status',
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
                    'Contact_CaseContact_Case_01.status_id:label',
                    'IS NOT EMPTY',
                  ],
                ],
                [
                  'path' => 'civicrm/case/add?reset=1&action=add&cid=[id]&context=case',
                  'icon' => 'fa-plus-square-o',
                  'text' => 'Create Case',
                  'style' => 'warning',
                  'condition' => [
                    'Contact_CaseContact_Case_01.status_id:label',
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
