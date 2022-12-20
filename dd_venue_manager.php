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
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function dd_venue_manager_civicrm_install(): void {
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

/**
 * Register Manage Venue permission
 *
 * @param $permissions
 * @return void
 */
function dd_venue_manager_civicrm_permission(&$permissions) {
  $permissions['manage venue'] = [
    E::ts('Manage Venue'),
    E::ts('Grants the necessary permissions for venues managing'),
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
    if (CRM_Core_Permission::check('administer CiviCRM')) {
      // get the maximum key of $params
      // in order to add it into the existing menu
      $navID = (int) _get_navigation_menu_key_max($params) + 1;
    } else {
      // reset menu -> just venues menu nav should be shown
      $navID = 0;
      $params = [];
    }

    $params[$navID] = _add_venue_manager_navigation_menu($navID);
  }
}

/**
 * New navigation menu (venues)
 *
 * @param $navID
 * @return array
 */
function _add_venue_manager_navigation_menu($navID) {
  return array(
    'attributes' => array(
      'label'      => E::ts('Venues'),
      'name'       => 'Venues',
      'url'        => null,
      'permission' => null,
      'operator'   => null,
      'separator'  => null,
      'parentID'   => null,
      'navID'      => $navID,
      'active'     => 1,
      'icon'       => 'crm-i fa-building-o',
    ),
    'child' => array(
      1 => array(
        'attributes' => array(
          'label'      => E::ts('Search Venues'),
          'name'       => 'Search Venues',
          'url'        => 'civicrm/venue-search',
          'permission' => 'manage venue',
          'operator'   => null,
          'separator'  => null,
          'parentID'   => $navID,
          'navID'      => 1,
          'active'     => 1,
          'icon'       => 'crm-i fa-search'
        ),
        'child' => null,
      ),
      2 => array(
        'attributes' => array(
          'label'      => E::ts('Venue Search Last Contacted'),
          'name'       => 'Venue Search Last Contacted',
          'url'        => 'civicrm/venue-search-last-contacted-test',
          'permission' => 'manage venue',
          'operator'   => null,
          'separator'  => 1,
          'parentID'   => $navID,
          'navID'      => 2,
          'active'     => 1,
          'icon'       => 'crm-i fa-search'
        ),
        'child' => null,
      ),
      3 => array(
        'attributes' => array(
          'label'      => E::ts('New Venue'),
          'name'       => 'New Venue',
          'url'        => 'civicrm/contact/add?ct=Organization&cst=Venue&reset=1',
          'permission' => 'manage venue',
          'operator'   => null,
          'separator'  => null,
          'parentID'   => $navID,
          'navID'      => 3,
          'active'     => 1,
          'icon'       => 'crm-i fa-plus-square-o'
        ),
        'child' => null,
      ),
      4 => array(
        'attributes' => array(
          'label'      => E::ts('New Venue Contact Person'),
          'name'       => 'New Venue Contact Person',
          'url'        => 'civicrm/contact/add?ct=Individual&cst=Venue_Contact_Person&reset=1',
          'permission' => 'manage venue',
          'operator'   => null,
          'separator'  => 1,
          'parentID'   => $navID,
          'navID'      => 4,
          'active'     => 1,
          'icon'       => 'crm-i fa-user-plus'
        ),
        'child' => null,
      ),
      5 => array(
        'attributes' => array(
          'label'      => E::ts('ToDo'),
          'name'       => 'ToDo',
          'url'        => 'civicrm/venue-todo',
          'permission' => 'manage venue',
          'operator'   => null,
          'separator'  => null,
          'parentID'   => $navID,
          'navID'      => 5,
          'active'     => 1,
          'icon'       => 'crm-i fa-check-square-o'
        ),
        'child' => null,
      ),
    ),
  );
}

/**
 * Get Navigation Menu Max Key
 *
 * @param $menuArray
 * @return mixed
 */
function _get_navigation_menu_key_max($menuArray) {
  $max = array(max(array_keys($menuArray)));
  foreach($menuArray as $v) {
    if (!empty($v['child'])) {
      $max[] = _get_navigation_menu_key_max($v['child']);
    }
  }
  return max($max);
}

