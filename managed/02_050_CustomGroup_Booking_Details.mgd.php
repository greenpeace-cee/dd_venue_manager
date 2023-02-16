<?php
use CRM_DdVenueManager_ExtensionUtil as E;

return [
  [
    'name' => 'CustomGroup_Booking_Details',
    'entity' => 'CustomGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Booking_Details',
        'title' => 'Booking Details',
        'extends' => 'Activity',
        'extends_entity_column_id' => NULL,
        // TODO: limit to activity type "Booking_Details"
        'extends_entity_column_value' => NULL,
        'style' => 'Inline',
        'collapse_display' => FALSE,
        'help_pre' => '',
        'help_post' => '',
        'weight' => 17,
        'is_active' => TRUE,
        'is_multiple' => FALSE,
        'min_multiple' => NULL,
        'max_multiple' => NULL,
        'collapse_adv_display' => TRUE,
        'created_date' => '2022-09-08 12:10:18',
        'is_reserved' => FALSE,
        'is_public' => TRUE,
        'icon' => '',
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Category',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Category',
        'label' => 'Category',
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
        'column_name' => 'category_65',
        'option_group_id.name' => 'Booking_Details_Category',
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Working_Days',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Working_Days',
        'label' => 'Working Days',
        'data_type' => 'String',
        'html_type' => 'Text',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'working_days_54',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Working_Times',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Working_Times',
        'label' => 'Working Times',
        'data_type' => 'String',
        'html_type' => 'Text',
        'default_value' => '10:30 - 16:30',
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'working_times_55',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Setup_Times',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Setup_Times',
        'label' => 'Setup Times',
        'data_type' => 'String',
        'html_type' => 'Text',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'setup_times_49',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Registration_on_Site',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Registration_on_Site',
        'label' => 'Registration on Site',
        'data_type' => 'Memo',
        'html_type' => 'TextArea',
        'default_value' => '1. Ansprechpartner',
        'is_required' => FALSE,
        'is_searchable' => TRUE,
        'is_search_range' => FALSE,
        'help_pre' => NULL,
        'help_post' => NULL,
        'mask' => NULL,
        'attributes' => 'rows=4, cols=60',
        'javascript' => NULL,
        'is_active' => TRUE,
        'is_view' => FALSE,
        'options_per_line' => NULL,
        'text_length' => NULL,
        'start_date_years' => NULL,
        'end_date_years' => NULL,
        'date_format' => NULL,
        'time_format' => NULL,
        'note_columns' => 60,
        'note_rows' => 2,
        'column_name' => 'registration_on_site_66',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Site_Details',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Site_Details',
        'label' => 'Site Details',
        'data_type' => 'Memo',
        'html_type' => 'TextArea',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
        'is_search_range' => FALSE,
        'help_pre' => NULL,
        'help_post' => NULL,
        'mask' => NULL,
        'attributes' => 'rows=4, cols=60',
        'javascript' => NULL,
        'is_active' => TRUE,
        'is_view' => FALSE,
        'options_per_line' => NULL,
        'text_length' => NULL,
        'start_date_years' => NULL,
        'end_date_years' => NULL,
        'date_format' => NULL,
        'time_format' => NULL,
        'note_columns' => 60,
        'note_rows' => 3,
        'column_name' => 'site_details_57',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Topic',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Topic',
        'label' => 'Topic',
        'data_type' => 'Int',
        'html_type' => 'Select',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'topic_50',
        'option_group_id.name' => 'Booking_Details_Topic',
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Pavillon',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Pavillon',
        'label' => 'Pavillon',
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
        'column_name' => 'pavillon',
        'option_group_id.name' => 'Booking_Details_Pavillon',
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Round_Desk',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Round_Desk',
        'label' => 'Round Desk',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'round_desk',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Beachflag',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Beachflag',
        'label' => 'Beachflag',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'beachflag',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_VR_Glasses',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'VR_Glasses',
        'label' => 'VR Glasses',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'vr_glasses',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Storage_Available',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Storage_Available',
        'label' => 'Storage Available',
        'data_type' => 'Boolean',
        'html_type' => 'Radio',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'storage_available',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
  [
    'name' => 'CustomGroup_Booking_Details_CustomField_Other_Equipment',
    'entity' => 'CustomField',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'custom_group_id.name' => 'Booking_Details',
        'name' => 'Other_Equipment',
        'label' => 'Other Equipment',
        'data_type' => 'String',
        'html_type' => 'Text',
        'default_value' => NULL,
        'is_required' => FALSE,
        'is_searchable' => FALSE,
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
        'column_name' => 'other_equipment',
        'option_group_id' => NULL,
        'serialize' => 0,
        'filter' => NULL,
        'in_selector' => FALSE,
      ],
    ],
  ],
];
