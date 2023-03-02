<?php
return [
  [
    'name' => 'ContactLayout_Venue',
    'entity' => 'ContactLayout',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'label' => 'Venue',
        'contact_type' => 'Organization',
        'contact_sub_type' => [
          'Venue',
        ],
        'groups' => NULL,
        'weight' => 1,
        'blocks' => [
          [
            [
              [
                'name' => 'profile.Venue_Summary',
                'title' => 'Venue Summary',
                'collapsible' => TRUE,
              ],
              [
                'name' => 'afform_search.afsearchVenueManager',
                'title' => 'Venue Manager',
                'collapsible' => FALSE,
                'collapsed' => FALSE,
                'showTitle' => FALSE,
              ],
              [
                'name' => 'afform_search.afsearchVenueContactPerson',
                'title' => 'Venue Contact Person',
                'collapsible' => TRUE,
                'collapsed' => FALSE,
                'showTitle' => FALSE,
              ],
              [
                'name' => 'core.Address',
                'title' => 'Address',
              ],
            ],
            [
              [
                'name' => 'core.Basic',
                'title' => 'ID, Type, Tags',
              ],
              [
                'name' => 'afform_search.afsearchCooperation',
                'title' => 'Cooperation',
              ],
              [
                'name' => 'core.Email',
                'title' => 'Email',
              ],
              [
                'name' => 'core.Phone',
                'title' => 'Phone',
              ],
              [
                'name' => 'core.Website',
                'title' => 'Website',
              ],
              [
                'name' => 'relationshipblock.relationshipblock',
                'title' => 'Key Relationships',
              ],
            ],
          ],
        ],
        'tabs' => [
          [
            'id' => 'summary',
            'is_active' => TRUE,
          ],
          [
            'id' => 'custom_18',
            'is_active' => FALSE,
          ],
          [
            'id' => 'afsearchVenueAttachments',
            'is_active' => TRUE,
          ],
          [
            'id' => 'mailing',
            'is_active' => FALSE,
          ],
          [
            'id' => 'case',
            'is_active' => TRUE,
          ],
          [
            'id' => 'activity',
            'is_active' => TRUE,
          ],
          [
            'id' => 'rel',
            'is_active' => TRUE,
          ],
          [
            'id' => 'group',
            'is_active' => TRUE,
          ],
          [
            'id' => 'civimobile',
            'is_active' => FALSE,
          ],
          [
            'id' => 'note',
            'is_active' => FALSE,
          ],
          [
            'id' => 'tag',
            'is_active' => TRUE,
          ],
          [
            'id' => 'log',
            'is_active' => TRUE,
          ],
          [
            'id' => 'custom_2',
            'is_active' => FALSE,
          ],
        ],
      ],
    ],
  ],
];
