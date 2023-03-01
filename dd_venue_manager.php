<?php

require_once 'dd_venue_manager.civix.php';
// phpcs:disable
use Civi\DdVenueManager\Utils\CaseUtils;
use Civi\DdVenueManager\Utils\VenueContactPersonLogic;
use CRM_DdVenueManager_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function dd_venue_manager_civicrm_config(&$config): void {
  $groupsWithoutExtend = \Civi\Api4\CustomGroup::get(FALSE)
    ->selectRowCount()
    ->addWhere('name', 'IN', ['Venue_Contact_Person_Details', 'Booking_Details'])
    ->addWhere('extends_entity_column_value', 'IS EMPTY')
    ->execute()
    ->count();
  if ($groupsWithoutExtend) {
    // extends_entity_column_value cannot be set via managed entities for some
    // scenarios. apply manually here
    $relationshipType = \Civi\Api4\RelationshipType::get(FALSE)
      ->addSelect('id')
      ->addWhere('name_a_b', '=', 'venue contact person')
      ->execute()
      ->first();
    // limit venue contact person details fields to venue contact person relationship
    \Civi\Api4\CustomGroup::update(FALSE)
      ->addValue('extends', 'Relationship')
      ->addValue('extends_entity_column_value', $relationshipType['id'])
      ->addWhere('name', '=', 'Venue_Contact_Person_Details')
      ->execute();

    $optionValue = \Civi\Api4\OptionValue::get(FALSE)
      ->addSelect('value')
      ->addWhere('option_group_id:name', '=', 'activity_type')
      ->addWhere('name', '=', 'Booking Confirmation')
      ->execute()
      ->first();
    // limit booking details fields to booking details activity
    \Civi\Api4\CustomGroup::update(FALSE)
      ->addValue('extends', 'Activity')
      ->addValue('extends_entity_column_value', $optionValue['value'])
      ->addWhere('name', '=', 'Booking_Details')
      ->execute();
  }
  _dd_venue_manager_civix_civicrm_config($config);
}

/**
<<<<<<< HEAD
=======
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function dd_venue_manager_civicrm_install(): void {
  \Civi\Api4\CaseType::save(FALSE)
    ->addRecord([
      'name' => 'Venue',
      'title' => 'Venue',
      'definition' => [
        'restrictActivityAsgmtToCmsUser' => 0,
        'activityAsgmtGrps' => [],
        'activityTypes' => [
          [
            'name' => 'Open Case',
            'max_instances' => '1',
          ],
          [
            'name' => 'Request',
          ],
          [
            'name' => 'Phone Call',
          ],
          [
            'name' => 'Personal Email',
          ],
          [
            'name' => 'Meeting',
          ],
          [
            'name' => 'Details/Adjustment',
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
          'Requested',
          'Active',
          'Prospect',
          'Paused',
          'Rejected',
          'Inactive',
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
        ],
      ],
    ])
    ->setMatch([
      'name',
    ])
    ->execute();

  \Civi\Api4\LocationType::create(FALSE)
    ->addValue('name', 'MailingAddress')
    ->addValue('display_name', 'Mailing Address')
    ->execute();

  foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $siteAddress) {
    \Civi\Api4\LocationType::create(FALSE)
      ->addValue('name', 'SiteAddress' . $siteAddress)
      ->addValue('display_name', 'Site Address ' . $siteAddress)
      ->execute();
  }
  _dd_venue_manager_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function dd_venue_manager_civicrm_postInstall(): void {
  _dd_venue_manager_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function dd_venue_manager_civicrm_uninstall(): void {
  _dd_venue_manager_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function dd_venue_manager_civicrm_enable(): void {
  _dd_venue_manager_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function dd_venue_manager_civicrm_disable(): void {
  _dd_venue_manager_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function dd_venue_manager_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _dd_venue_manager_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function dd_venue_manager_civicrm_entityTypes(&$entityTypes): void {
  _dd_venue_manager_civix_civicrm_entityTypes($entityTypes);
}

function dd_venue_manager_civicrm_links($operation, $objectName, $objectId, &$links, &$mask, &$values) {
  if ($operation === 'case.tab.row' && $objectName === 'Activity') {
    $isBookingConfirmation = \Civi\Api4\Activity::get(FALSE)
      ->selectRowCount()
      ->addWhere('id', '=', $objectId)
      ->addWhere('activity_type_id:name', '=', 'Booking Confirmation')
      ->execute()
      ->count();
    if ($isBookingConfirmation) {
      $links[] = [
        'class' => 'no-popup',
        'extra' => 'target="_blank"',
        'name' => 'Export Venue Overview',
        'url' => 'civicrm/dd-venue-manager/create-case-activity-civi-office-document',
        'qs' => 'activity_id=' . $objectId,
        'title' => 'Export Venue Overview',
      ];
    }
  }
}
// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Register Manage Venue permission
 *
 * @param $permissions
 * @return void
 */
function dd_venue_manager_civicrm_permission(&$permissions) {
  $permissions['manage venue'] = [
    E::ts('Manage Venue'),
    E::ts('Grants the necessary permissions for to manage venues'),
  ];
}

/**
 * Amend Navigation Menu
 *
 * @param $params
 * @return void
 */
function dd_venue_manager_civicrm_navigationMenu(&$params) {
  if (CRM_Core_Permission::check('manage venue')) {
    if (!CRM_Core_Permission::check('administer CiviCRM')) {
      $params = array_filter($params, function($item) {
        return in_array($item['attributes']['name'], ['Home', 'Search', 'recent_items']);
      });
    }
    _dd_venue_manager_civix_insert_navigation_menu($params, NULL, [
      'label'      => E::ts('Venues'),
      'name'       => 'Venues',
      'url'        => null,
      'permission' => 'manage venue',
      'icon'       => 'crm-i fa-building-o',
      'weight'     => 10,
    ]);
    _dd_venue_manager_civix_insert_navigation_menu($params, 'Venues', [
      'label'      => E::ts('Search Venues'),
      'name'       => 'Search Venues',
      'url'        => 'civicrm/venue-search',
      'permission' => 'manage venue',
      'icon'       => 'crm-i fa-search'
    ]);
    _dd_venue_manager_civix_insert_navigation_menu($params, 'Venues', [
      'label'      => E::ts('New Venue'),
      'name'       => 'New Venue',
      'url'        => 'civicrm/contact/add?ct=Organization&cst=Venue&reset=1',
      'permission' => 'manage venue',
      'icon'       => 'crm-i fa-plus-square-o'
    ]);
    _dd_venue_manager_civix_insert_navigation_menu($params, 'Venues', [
      'label'      => E::ts('New Venue Contact Person'),
      'name'       => 'New Venue Contact Person',
      'url'        => 'civicrm/contact/add?ct=Individual&cst=Venue_Contact_Person&reset=1',
      'permission' => 'manage venue',
      'icon'       => 'crm-i fa-user-plus'
    ]);
    _dd_venue_manager_civix_insert_navigation_menu($params, 'Venues', [
      'label'      => E::ts('ToDo'),
      'name'       => 'ToDo',
      'url'        => 'civicrm/venue-todo',
      'permission' => 'manage venue',
      'icon'       => 'crm-i fa-check-square-o'
    ]);
  }
}

function dd_venue_manager_civicrm_caseSummary($caseID) {
  $caseTypeName = CaseUtils::getCaseTypeNameById($caseID);
  if ($caseTypeName !== 'Venue') {
    return [];
  }

  $caseClientId = CaseUtils::getCaseClientId($caseID);
  if (empty($caseClientId)) {
    return [];
  }

  $contactSubType = Civi\DdVenueManager\Utils\Contact::getSubType($caseClientId);
  if (in_array($contactSubType, ['Venue_Contact_Person', 'Venue'])) {
    return [];
  }

  return [
    'relationships' => [
      'value' => (CRM_Core_Smarty::singleton())->fetchWith('CRM/DdVenueManager/Chunk/CaseSummaryVenueContactPersonRelationship.tpl', [
        'relations' => VenueContactPersonLogic::getRelationsData($caseID),
        'caseId' => $caseID,
        'caseClientId' => $caseClientId,
      ]),
    ],
  ];
}
