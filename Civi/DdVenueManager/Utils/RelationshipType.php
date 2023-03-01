<?php

namespace Civi\DdVenueManager\Utils;

class RelationshipType {

  /**
   * @param $relationTypeName
   * @return string|null
   * @throws UnauthorizedException
   * @throws \API_Exception
   */
  public static function getRelationTypeIdByName($relationTypeName) {
    if (empty($relationTypeName)) {
      return NULL;
    }

    $relationshipType = \Civi\Api4\RelationshipType::get(FALSE)
      ->addSelect('id')
      ->addWhere('name_a_b', '=', $relationTypeName)
      ->execute()
      ->first();

    return !empty($relationshipType['id']) ? $relationshipType['id'] : null;
  }

  /**
   * @return string|null
   * @throws UnauthorizedException
   * @throws \API_Exception
   */
  public static function getVenueContactPersonRelationTypeId() {
    return RelationshipType::getRelationTypeIdByName('venue contact person');
  }

}
