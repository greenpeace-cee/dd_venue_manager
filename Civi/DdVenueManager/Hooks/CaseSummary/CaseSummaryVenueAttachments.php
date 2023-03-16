<?php

namespace Civi\DdVenueManager\Hooks\CaseSummary;

use Civi\Core\Event\GenericHookEvent;
use Civi\DdVenueManager\Utils\AfformLoader;
use Civi\DdVenueManager\Utils\Contact;
use Civi\DdVenueManager\Utils\CaseUtils;
use CRM_Core_Smarty;

class CaseSummaryVenueAttachments {

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

    $name = 'afsearchVenueAttachments';
    $afformLoader = new AfformLoader($name, ['contact_id' => $caseClientId]);
    $afformTemplate = $afformLoader->getTemplate();
    $afformLoader->loadAngularjsModule();

    $event->addReturnValues([
      'venue_attachments' => [
        'value' => (CRM_Core_Smarty::singleton())->fetchWith('CRM/DdVenueManager/Chunk/Hook/CaseSummaryVenueAttachments.tpl', [
          'afformTemplate' => $afformTemplate,
        ]),
      ],
    ]);
  }

}
