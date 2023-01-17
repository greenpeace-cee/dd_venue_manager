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

function dd_venue_manager_civicrm_caseSummary($caseID) {
  // fetch e.g. using:
  /*
   * $relationships = \Civi\Api4\Relationship::get()
   *   ->addWhere('relationship_type_id:name', '=', 'venue contact person')
   *   ->addWhere('case_id', '=', $caseID)
   *   ->execute();
   */
  return [
    'relationships' => [
      'label' => '<h4>Contact Persons</h4>',
      'value' => '
<table id="caseRoles-selector-1" class="dataTable no-footer" role="grid" aria-describedby="caseRoles-selector-1_info">
        <thead>
          <tr role="row">
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Primary?</th>
            <th>Position</th>
            <th>Decision Maker?</th>
            <th>DDC Disposition</th>
            <th>On-Site Contact Person?</th>
            <th>Actions</th>
          </tr>
        </thead>
      <tbody><tr role="row" class="odd"><td><a class="view-contact" title="View Contact" href="#">Patrick Figel</a></td>
      <td>+43 123 4567890</td>
      <td>pfigel@greenpeace.org</td>
      <td>Yes</td>
      <td>Filialleiter</td>
      <td>No</td>
      <td>pro DDC</td>
      <td>Yes</td>
      <td><a href="/civicrm/contact/view/rel?action=update&reset=1&cid=203&id=218&rtype=a_b" title="Edit Contact Person"><i class="crm-i fa-pencil" aria-hidden="true"></i></a><a href="#deleteCaseRoleDialog" title="Remove Contact Person" class="crm-hover-button case-miniform"><span class="icon delete-icon"></span></a></td></tr></tbody></table>
',
    ],
  ];
}

