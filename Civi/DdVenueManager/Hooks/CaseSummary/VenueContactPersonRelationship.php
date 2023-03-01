<?php

namespace Civi\DdVenueManager\Hooks\CaseSummary;

use Civi\DdVenueManager\Utils\CaseUtils;
use Civi\DdVenueManager\Utils\Contact;
use Civi\DdVenueManager\Utils\VenueContactPersonLogic;
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
          'relations' => VenueContactPersonLogic::getRelationsData($event->caseID),
          'caseId' => $event->caseID,
          'caseClientId' => $caseClientId,
        ]),
      ],
    ]);
  }

}
