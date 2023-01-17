<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type',
    'entity' => 'OptionGroup',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Venue_Attachment_Attachment_Type',
        'title' => 'Venue Attachment :: Attachment Type',
        'description' => NULL,
        'data_type' => 'Int',
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'is_locked' => FALSE,
        'option_value_fields' => [
          'name',
          'label',
          'description',
        ],
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Organigramm',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Organigramm',
        'value' => '1',
        'name' => 'Organigramm',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Pr_sentation_DDC',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Präsentation DDC',
        'value' => '2',
        'name' => 'Präsentation DDC',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Filialliste',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Filialliste',
        'value' => '3',
        'name' => 'Filialliste',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_GLF',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'GLF',
        'value' => '4',
        'name' => 'GLF',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Pitchcard',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Pitchcard',
        'value' => '5',
        'name' => 'Pitchcard',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Feedbacksheet_Vorlage',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Feedbacksheet Vorlage',
        'value' => '6',
        'name' => 'Feedbacksheet Vorlage',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Feedbacksheet',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Feedbacksheet',
        'value' => '7',
        'name' => 'Feedbacksheet',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Filialleiter_Briefing',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Filialleiter-Briefing',
        'value' => '8',
        'name' => 'Filialleiter-Briefing',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Contract_Genehmigung',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Contract/Genehmigung',
        'value' => '9',
        'name' => 'Contract/Genehmigung',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Site_plan',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Site plan',
        'value' => '10',
        'name' => 'Site plan',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Safety_House_Rules',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Safety-/House-Rules',
        'value' => '11',
        'name' => 'Safety-/House-Rules',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
  [
    'name' => 'OptionGroup_Venue_Attachment_Attachment_Type_OptionValue_Other',
    'entity' => 'OptionValue',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'option_group_id.name' => 'Venue_Attachment_Attachment_Type',
        'label' => 'Other',
        'value' => '12',
        'name' => 'Other',
        'grouping' => NULL,
        'filter' => 0,
        'is_default' => FALSE,
        'description' => NULL,
        'is_optgroup' => FALSE,
        'is_reserved' => FALSE,
        'is_active' => TRUE,
        'component_id' => NULL,
        'domain_id' => NULL,
        'visibility_id' => NULL,
        'icon' => NULL,
        'color' => NULL,
      ],
    ],
  ],
];
