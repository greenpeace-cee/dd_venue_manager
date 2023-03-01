<?php

namespace Civi\DdVenueManager\Hooks\CaseSummary;

use Civi\Core\Event\GenericHookEvent;
use Civi\DdVenueManager\Utils\CaseUtils;
use CRM_Core_Smarty;
use CRM_Utils_Address;
use Civi\Api4\Address;

class AddClientStreetAddress {

  /**
   * @param GenericHookEvent $event
   */
  public static function run(GenericHookEvent $event) {
    $caseClientId = CaseUtils::getCaseClientId($event->caseID);
    if (empty($caseClientId)) {
      return;
    }

    $addresses = \Civi\Api4\Address::get(FALSE)
      ->addSelect('*')
      ->addWhere('is_primary', '=', TRUE)
      ->addWhere('contact_id', '=', $caseClientId)
      ->setLimit(1)
      ->execute()
      ->first();

    if (empty($addresses)) {
      return;
    }

    $event->addReturnValues([
      'add_client_street_address' => [
        'value' => (CRM_Core_Smarty::singleton())->fetchWith('CRM/DdVenueManager/Chunk/Hook/AddClientStreetAddress.tpl', [
          'addressFormatted' => CRM_Utils_Address::format($addresses),
        ]),
      ],
    ]);
  }

}
