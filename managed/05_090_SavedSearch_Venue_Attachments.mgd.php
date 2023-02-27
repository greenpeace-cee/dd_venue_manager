<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Venue_Attachments',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'never',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Attachments',
        'label' => 'Venue Attachments',
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'Custom_Venue_Attachment',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'Custom_Venue_Attachment_Contact_entity_id_01.display_name',
            'Attachment_Type:label',
            'File',
            'Shared:label',
            'Archived:label',
            'Custom_Venue_Attachment_Contact_entity_id_01.id',
            'result_row_num',
          ],
          'orderBy' => [],
          'where' => [],
          'groupBy' => [],
          'join' => [
            [
              'Contact AS Custom_Venue_Attachment_Contact_entity_id_01',
              'LEFT',
              [
                'entity_id',
                '=',
                'Custom_Venue_Attachment_Contact_entity_id_01.id',
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
    'name' => 'SavedSearch_Venue_Attachments_SearchDisplay_Venue_Attachments_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'never',
    'update' => 'never',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Attachments_Table_1',
        'label' => 'Venue Attachments Table',
        'saved_search_id.name' => 'Venue_Attachments',
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
              'Attachment_Type:label',
              'ASC',
            ],
          ],
          'columns' => [
            [
              'type' => 'field',
              'key' => 'Attachment_Type:label',
              'dataType' => 'Integer',
              'label' => 'Attachment Type',
              'sortable' => TRUE,
              'editable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'File',
              'dataType' => 'Integer',
              'label' => 'File',
              'sortable' => TRUE,
              'link' => [
                'path' => '[File]',
                'entity' => '',
                'action' => '',
                'join' => '',
                'target' => '_blank',
              ],
              'icons' => [
                [
                  'icon' => 'fa-file',
                  'side' => 'left',
                  'if' => [],
                ],
              ],
              'rewrite' => 'Download',
            ],
            [
              'type' => 'field',
              'key' => 'Shared:label',
              'dataType' => 'Boolean',
              'label' => 'Shared',
              'sortable' => TRUE,
              'icons' => [
                [
                  'icon' => 'fa-lock',
                  'side' => 'right',
                  'if' => [
                    'Shared',
                    'IS EMPTY',
                  ],
                ],
              ],
            ],
            [
              'type' => 'field',
              'key' => 'Archived:label',
              'dataType' => 'Boolean',
              'label' => 'Archived',
              'sortable' => TRUE,
              'icons' => [
                [
                  'icon' => 'fa-archive',
                  'side' => 'right',
                  'if' => [
                    'Archived',
                    '=',
                    TRUE,
                  ],
                ],
              ],
            ],
            [
              'size' => 'btn-sm',
              'links' => [
                [
                  'entity' => '',
                  'action' => '',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => 'Edit',
                  'style' => 'primary',
                  'path' => 'civicrm/contact/view/cd/edit?reset=1&type=Organization&groupID=17&entityID=[entity_id]&cgcount=[result_row_num]&multiRecordDisplay=single&mode=edit',
                  'condition' => [],
                ],
              ],
              'type' => 'buttons',
              'alignment' => 'text-right',
            ],
          ],
          'cssRules' => [],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
