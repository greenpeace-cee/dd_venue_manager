<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Individual_Details',
    'entity' => 'CustomGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Individual_Details',
        'title' => 'Individual Details',
        'table_name' => 'civicrm_value_individual_details',
        'extends' => 'Individual',
        'extends_entity_column_id' => NULL,
        'extends_entity_column_value' => NULL,
        'style' => 'Inline',
        'collapse_display' => FALSE,
        'help_pre' => '',
        'help_post' => '',
        'weight' => 14,
        'is_active' => TRUE,
        'is_multiple' => FALSE,
        'min_multiple' => NULL,
        'max_multiple' => NULL,
        'collapse_adv_display' => FALSE,
        'is_reserved' => FALSE,
        'is_public' => TRUE,
        'icon' => '',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Individual_Details_CustomField_Postfix_Title',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Individual_Details',
        'name' => 'Postfix_Title',
        'label' => 'Postfix Title',
        'data_type' => 'String',
        'html_type' => 'Text',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => TRUE,
        'is_search_range' => FALSE,
        'help_pre' => NULL,
        'help_post' => NULL,
        'mask' => NULL,
        'attributes' => NULL,
        'javascript' => NULL,
        'is_active' => TRUE,
        'is_view' => FALSE,
        'options_per_line' => NULL,
        'text_length' => 255,
        'start_date_years' => NULL,
        'end_date_years' => NULL,
        'date_format' => NULL,
        'time_format' => NULL,
        'note_columns' => 60,
        'note_rows' => 4,
        'column_name' => 'postfix_title',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
];
