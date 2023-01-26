<?php

namespace Civi\DdVenueManager\Utils;

use Civi\API\Exception\UnauthorizedException;
use CRM_Case_BAO_Case;

class CaseUtils {

  /**
   * @param $caseId
   * @return string|null
   * @throws \API_Exception
   * @throws UnauthorizedException
   */
  public static function getCaseTypeNameById($caseId) {
    if (empty($caseId)) {
      return NULL;
    }

    $case = \Civi\Api4\CiviCase::get()
      ->addSelect('case_type_id:name')
      ->addWhere('id', '=', $caseId)
      ->setLimit(1)
      ->execute()
      ->first();

    return !empty($case['case_type_id:name']) ? $case['case_type_id:name'] : NULL;
  }

  /**
   * @param $caseId
   * @return int|null
   */
  public static function getCaseClientId($caseId) {
    if (empty($caseId)) {
      return NULL;
    }

    $clients = CRM_Case_BAO_Case::getCaseClients($caseId);
    if (empty($clients[0])) {
      return NULL;
    }

    return (int) $clients[0];
  }

}
