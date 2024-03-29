<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details',
    'entity' => 'CustomGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Contact_Person_Details',
        'title' => 'Venue Contact Person Details',
        'table_name' => 'civicrm_value_venue_contact_person',
        'extends' => 'Relationship',
        'extends_entity_column_id' => NULL,
        // TODO: limit to venue contact person relationship type
        'extends_entity_column_value' => NULL,
        'style' => 'Inline',
        'collapse_display' => FALSE,
        'help_pre' => '',
        'help_post' => '',
        'weight' => 18,
        'is_active' => TRUE,
        'is_multiple' => FALSE,
        'min_multiple' => NULL,
        'max_multiple' => NULL,
        'collapse_adv_display' => TRUE,
        'is_reserved' => FALSE,
        'is_public' => TRUE,
        'icon' => '',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details_CustomField_Position',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Venue_Contact_Person_Details',
        'name' => 'Position',
        'label' => 'Position',
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
        'column_name' => 'position',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details_CustomField_Primary',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Venue_Contact_Person_Details',
        'name' => 'Primary',
        'label' => 'Primary',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
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
        'column_name' => 'is_primary',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details_CustomField_Decision_Maker',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Venue_Contact_Person_Details',
        'name' => 'Decision_Maker',
        'label' => 'Decision Maker',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => '0',
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
        'column_name' => 'decision_maker',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details_CustomField_DDC_Disposition',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Venue_Contact_Person_Details',
        'name' => 'DDC_Disposition',
        'label' => 'DDC Disposition',
        'data_type' => 'Int',
        'html_type' => 'Radio',
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
        'column_name' => 'ddc_disposition',
        'option_group_id.name' => 'Venue_Contact_Person_Details_DDC_Disposition',
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Venue_Contact_Person_Details_CustomField_On_Site_Contact',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Venue_Contact_Person_Details',
        'name' => 'On_Site_Contact',
        'label' => 'On-Site Contact',
        'data_type' => 'Int',
        'html_type' => 'Radio',
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
        'column_name' => 'on_site_contact',
        'option_group_id.name' => 'Venue_Contact_Person_Details_On_Site_Contact',
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
];
