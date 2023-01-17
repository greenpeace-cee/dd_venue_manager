<?php
use CRM_Grant_ExtensionUtil as E;

return [
  [
    'name' => 'CaseType_cooperation',
    'entity' => 'CaseType',
    'cleanup' => 'never',
    'update' => 'always',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'cooperation',
        'title' => 'Cooperation',
        'description' => NULL,
        'is_active' => TRUE,
        'is_reserved' => FALSE,
        'weight' => 1,
        'definition' => [
          'restrictActivityAsgmtToCmsUser' => 0,
          'activityAsgmtGrps' => [],
          'activityTypes' => [
            [
              'name' => 'Open Case',
              'max_instances' => '1',
            ],
            [
              'name' => 'Booking Request',
            ],
            [
              'name' => 'Email',
            ],
            [
              'name' => 'Phone Call',
            ],
            [
              'name' => 'Meeting',
            ],
            [
              'name' => 'Booking Coordination',
            ],
            [
              'name' => 'Booking Confirmation',
            ],
            [
              'name' => 'Booking Cancellation',
            ],
            [
              'name' => 'Incident',
            ],
            [
              'name' => 'On-Site Visit',
            ],
            [
              'name' => 'Feedback',
            ],
            [
              'name' => 'Coop Agreement',
            ],
            [
              'name' => 'Mail',
            ],
            [
              'name' => 'Summary',
            ],
          ],
          'statuses' => [
            'Rejected',
            'Requested',
            'Active',
            'Passive',
            'Paused',
          ],
          'activitySets' => [
            [
              'name' => 'standard_timeline',
              'label' => 'Standard Timeline',
              'timeline' => 1,
              'activityTypes' => [
                [
                  'name' => 'Open Case',
                  'status' => 'Completed',
                  'label' => 'Open Case',
                  'default_assignee_type' => '1',
                ],
              ],
            ],
          ],
          'timelineActivityTypes' => [
            [
              'name' => 'Open Case',
              'status' => 'Completed',
              'label' => 'Open Case',
              'default_assignee_type' => '1',
            ],
          ],
          'caseRoles' => [
            [
              'name' => 'Case Coordinator',
              'creator' => '1',
              'manager' => '1',
            ],
            [
              'name' => 'is venue officer contact person for',
            ],
            [
              'name' => 'is venue coordinator contact person for',
            ],
            [
              'name' => 'is venue officer for',
            ],
            [
              'name' => 'is coordinator for',
            ],
          ],
        ],
      ],
    ],
  ],
];
