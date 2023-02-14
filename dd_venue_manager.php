<?php

require_once 'dd_venue_manager.civix.php';
// phpcs:disable
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
