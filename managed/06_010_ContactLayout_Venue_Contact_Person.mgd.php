<?php
return [
  [
    'name' => 'ContactLayout_Venue_Contact_Person',
    'entity' => 'ContactLayout',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'label' => 'Venue Contact Person',
        'contact_type' => 'Individual',
        'contact_sub_type' => [
          'Venue_Contact_Person',
        ],
        'groups' => NULL,
        'weight' => 2,
        'blocks' => [
          [
            [
              [
                'name' => 'core.Email',
                'title' => 'Email',
              ],
              [
                'name' => 'core.Website',
                'title' => 'Website',
              ],
              [
                'name' => 'core.Address',
                'title' => 'Address',
              ],
              [
                'name' => 'core.CommunicationPreferences',
                'title' => 'Communication Preferences',
              ],
            ],
            [
              [
                'name' => 'core.Basic',
                'title' => 'ID, Type, Tags',
              ],
              [
                'name' => 'core.Phone',
                'title' => 'Phone',
              ],
              [
                'name' => 'core.IM',
                'title' => 'Instant Messenger',
              ],
              [
                'name' => 'core.Demographics',
                'title' => 'Demographics',
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
            'id' => 'afsearchVenueAttachments',
            'is_active' => FALSE,
          ],
          [
            'id' => 'log',
            'is_active' => TRUE,
          ],
          [
            'id' => 'custom_2',
            'is_active' => FALSE,
          ],
          [
            'id' => 'custom_18',
            'is_active' => FALSE,
          ],
        ],
      ],
    ],
  ],
];
