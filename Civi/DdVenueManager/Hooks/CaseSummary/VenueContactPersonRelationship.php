<?php

namespace Civi\DdVenueManager\Hooks\CaseSummary;

use Civi\DdVenueManager\Utils\CaseUtils;
use Civi\DdVenueManager\Utils\Contact;
use Civi\Core\Event\GenericHookEvent;
use CRM_Core_Smarty;

class VenueContactPersonRelationship {

  /**
   * @param GenericHookEvent $event
   */
  public static function run(GenericHookEvent $event) {
    $caseTypeName = CaseUtils::getCaseTypeNameById($event->caseID);
    if ($caseTypeName !== 'Venue') {
      return;
    }

    $caseClientId = CaseUtils::getCaseClientId($event->caseID);
    if (empty($caseClientId)) {
      return;
    }

    $contactSubType = Contact::getSubType($caseClientId);
    if (in_array($contactSubType, ['Venue_Contact_Person', 'Venue'])) {
      return;
    }

    $event->addReturnValues([
      'relationships' => [
        'value' => (CRM_Core_Smarty::singleton())->fetchWith('CRM/DdVenueManager/Chunk/Hook/CaseSummaryVenueContactPersonRelationship.tpl', [
          'relations' => VenueContactPersonRelationship::getRelationsData($event->caseID),
          'caseId' => $event->caseID,
          'caseClientId' => $caseClientId,
        ]),
      ],
    ]);
  }

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

    $relationships = \Civi\Api4\Relationship::get(FALSE)
      ->addSelect('id')
      ->addSelect('is_active')
      ->addSelect('contact.display_name')
      ->addSelect('contact.id')
      ->addSelect('Venue_Contact_Person_Details.Position')
      ->addSelect('Venue_Contact_Person_Details.Primary')
      ->addSelect('Venue_Contact_Person_Details.Decision_Maker')
      ->addSelect('Venue_Contact_Person_Details.DDC_Disposition')
      ->addSelect('Venue_Contact_Person_Details.DDC_Disposition:label')
      ->addSelect('Venue_Contact_Person_Details.On_Site_Contact:label')
      ->addWhere('relationship_type_id:name', '=', 'venue contact person')
      ->addWhere('case_id', '=', $caseId)
      ->addJoin('Contact AS contact', 'INNER', ['contact_id_a', '=', 'contact.id'])
      ->addJoin('Email AS email', 'LEFT', ['contact_id_a', '=', 'email.contact_id'], ['email.is_primary', '=', 1])
      ->addJoin('Phone AS phone', 'LEFT', ['contact_id_a', '=', 'phone.contact_id'], ['phone.is_primary', '=', 1])
      ->addOrderBy('is_active', 'DESC')
      ->execute();

    foreach ($relationships as $relationship) {
      $preparedRelationships[] = [
        'relationship_id' => $relationship['id'],
        'is_active' => $relationship['is_active'],
        'contact_display_name' => $relationship['contact.display_name'],
        'contact_id' => $relationship['contact.id'],
        'contact_phones' => VenueContactPersonRelationship::getContactPhones($relationship['contact.id']),
        'contact_emails' => VenueContactPersonRelationship::getContactEmails($relationship['contact.id']),
        'venue_contact_position' => $relationship['Venue_Contact_Person_Details.Position'],
        'venue_contact_primary' => $relationship['Venue_Contact_Person_Details.Primary'],
        'venue_contact_ddc_disposition' => $relationship['Venue_Contact_Person_Details.DDC_Disposition'],
        'venue_contact_decision_maker' => $relationship['Venue_Contact_Person_Details.Decision_Maker'],
        'venue_contact_decision_maker_label' => VenueContactPersonRelationship::makeBooleanLabel($relationship['Venue_Contact_Person_Details.Decision_Maker']),
        'venue_contact_on_site_contact_label' => $relationship['Venue_Contact_Person_Details.On_Site_Contact:label'],
        'venue_contact_primary_label' => VenueContactPersonRelationship::makeBooleanLabel($relationship['Venue_Contact_Person_Details.Primary']),
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
   * @param $contactId
   * @return array
   */
  public static function getContactPhones($contactId) {
    if (empty($contactId)) {
      return [];
    }

    $preparedPhones = [];
    $phones = \Civi\Api4\Phone::get()
      ->addSelect('location_type_id:label', 'phone', 'is_primary')
      ->addWhere('contact_id', '=', $contactId)
      ->execute();

    foreach ($phones as $phone) {
      $preparedPhones[] = [
        'locationTypeLabel' => $phone['location_type_id:label'],
        'phone' => $phone['phone'],
        'isPrimary' => $phone['is_primary'],
      ];
    }

    return $preparedPhones;
  }

  /**
   * @param $contactId
   * @return array
   */
  public static function getContactEmails($contactId) {
    if (empty($contactId)) {
      return [];
    }

    $preparedEmails = [];
    $emails = \Civi\Api4\Email::get()
      ->addSelect('location_type_id:label', 'email', 'is_primary')
      ->addWhere('contact_id', '=', $contactId)
      ->execute();

    foreach ($emails as $email) {
      $preparedEmails[] = [
        'locationTypeLabel' => $email['location_type_id:label'],
        'email' => $email['email'],
        'isPrimary' => $email['is_primary'],
      ];
    }

    return $preparedEmails;
  }

}
