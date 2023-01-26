<?php

namespace Civi\DdVenueManager\Utils;

use Civi\API\Exception\UnauthorizedException;

class VenueContactPersonLogic {

  /**
   * @param $caseId
   * @return array|null
   * @throws \API_Exception
   * @throws UnauthorizedException
   */
  public static function getRelationsData($caseId) {
    if (empty($caseId)) {
      return NULL;
    }

    $preparedRelationships = [];

    $relationships = \Civi\Api4\Relationship::get()
      ->addSelect('id')
      ->addSelect('phone.phone')
      ->addSelect('email.email')
      ->addSelect('contact.display_name')
      ->addSelect('contact.id')
      ->addSelect('Venue_Contact_Person_Details.Position')
      ->addSelect('Venue_Contact_Person_Details.Primary')
      ->addSelect('Venue_Contact_Person_Details.Decision_Maker')
      ->addSelect('Venue_Contact_Person_Details.DDC_Disposition')
      ->addSelect('Venue_Contact_Person_Details.DDC_Disposition:label')
      ->addSelect('Venue_Contact_Person_Details.On_Site_Contact')
      ->addWhere('relationship_type_id:name', '=', 'venue contact person')
      ->addWhere('case_id', '=', $caseId)
      ->addJoin('Contact AS contact', 'INNER', ['contact_id_b', '=', 'contact.id'])
      ->addJoin('Email AS email', 'LEFT', ['contact_id_b', '=', 'email.contact_id'], ['email.is_primary', '=', 1])
      ->addJoin('Phone AS phone', 'LEFT', ['contact_id_b', '=', 'phone.contact_id'], ['phone.is_primary', '=', 1])
      ->execute();

    foreach ($relationships as $relationship) {
      $preparedRelationships[] = [
        'relationship_id' => $relationship['id'],
        'contact_display_name' => $relationship['contact.display_name'],
        'contact_id' => $relationship['contact.id'],
        'contact_primary_phone' => $relationship['phone.phone'],
        'contact_primary_email' => $relationship['email.email'],
        'venue_contact_position' => $relationship['Venue_Contact_Person_Details.Position'],
        'venue_contact_primary' => $relationship['Venue_Contact_Person_Details.Primary'],
        'venue_contact_ddc_disposition' => $relationship['Venue_Contact_Person_Details.DDC_Disposition'],
        'venue_contact_on_site_contact' => $relationship['Venue_Contact_Person_Details.On_Site_Contact'],
        'venue_contact_decision_maker' => $relationship['Venue_Contact_Person_Details.Decision_Maker'],
        'venue_contact_decision_maker_label' => self::makeBooleanLabel($relationship['Venue_Contact_Person_Details.Decision_Maker']),
        'venue_contact_on_site_contact_label' => self::makeBooleanLabel($relationship['Venue_Contact_Person_Details.On_Site_Contact']),
        'venue_contact_primary_label' => self::makeBooleanLabel($relationship['Venue_Contact_Person_Details.Primary']),
        'venue_contact_ddc_disposition_label' => $relationship['Venue_Contact_Person_Details.DDC_Disposition:label'],
      ];
    }

    return $preparedRelationships;
  }

  /**
   * @param $value
   * @return mixed|string
   */
  public static function makeBooleanLabel($value) {
    if ($value === null) {
      return 'Not set';
    }

    if ($value === true) {
      return 'Yes';
    }

    if ($value === false) {
      return 'No';
    }

    return $value;
  }

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

    $relationshipType = \Civi\Api4\RelationshipType::get()
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
    return VenueContactPersonLogic::getRelationTypeIdByName('venue contact person');
  }

}
