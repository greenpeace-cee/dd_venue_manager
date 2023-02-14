<?php

namespace Civi\DdVenueManager\Utils;


class Extension {

  /**
   * Cache is checking if extensions is enabled
   *
   * @var array
   */
  private static $isEnableExtensions = [];

  /**
   * Is extension enabled
   * check inc cache
   *
   * @param $extensionName
   * @return bool
   */
  public static function isExtensionEnable($extensionName) {
    if (empty($extensionName)) {
      return FALSE;
    }

    if (!isset(self::$isEnableExtensions[$extensionName])) {
      self::$isEnableExtensions[$extensionName] = self::isExtensionEnableDatabaseCheck($extensionName);
    }

    return self::$isEnableExtensions[$extensionName];
  }

  /**
   * Is extension enabled
   * check in database
   *
   * @param $extensionName
   * @return bool
   */
  private static function isExtensionEnableDatabaseCheck($extensionName) {
    if (empty($extensionName)) {
      return FALSE;
    }

    try {
      $extensionStatus = civicrm_api3('Extension', 'getsingle', [
        'return' => "status",
        'full_name' => $extensionName,
      ]);
    } catch (Exception $e) {
      return FALSE;
    }

    if ($extensionStatus['status'] == 'installed') {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * Is "de.systopia.civioffice" enabled
   *
   * @return bool
   */
  public static function isCiviOfficeEnable() {
    return self::isExtensionEnable('de.systopia.civioffice');
  }

}
