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
  _dd_venue_manager_civix_civicrm_config($config);
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
    $links[] = [
      'class' => 'no-popup',
      'extra' => 'target="_blank"',
      'name' => 'Create Documents (CiviOffice)',
      'url' => 'civicrm/dd-venue-manager/create-case-activity-civi-office-document',
      'qs' => 'activity_id=' . $objectId,
      'title' => 'Create Documents (CiviOffice)',
    ];
  }
}
// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function dd_venue_manager_civicrm_preProcess($formName, &$form): void {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function dd_venue_manager_civicrm_navigationMenu(&$menu): void {
//  _dd_venue_manager_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _dd_venue_manager_civix_navigationMenu($menu);
//}

function dd_venue_manager_civicrm_caseSummary($caseID) {
  $caseTypeName = CaseUtils::getCaseTypeNameById($caseID);
  if ($caseTypeName !== 'Cooperation') {
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
