<?php

namespace Civi\DdVenueManager\Utils;


class Activity {

  /**
   * @param $activityId
   *
   * @return null|int
   */
  public static function getActivityCaseId($activityId) {
    if (empty($activityId)) {
      return NULL;
    }

    $caseActivity = \Civi\Api4\CaseActivity::get(FALSE)
      ->addSelect('case_id')
      ->addWhere('activity_id', '=', $activityId)
      ->setLimit(1)
      ->execute()
      ->first();

    if (empty($caseActivity['case_id'])) {
      return NULL;
    }

    return $caseActivity['case_id'];
  }

}
