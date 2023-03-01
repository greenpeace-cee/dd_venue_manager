<?php

namespace Civi\DdVenueManager\Utils;


use Civi\API\Exception\UnauthorizedException;

class Contact {

  /**
   * @param $contactId
   * @return string|null
   * @throws \API_Exception
   * @throws UnauthorizedException
   */
  public static function getSubType($contactId) {
    if (empty($contactId)) {
      return NULL;
    }

    $contact = \Civi\Api4\Contact::get(FALSE)
      ->addSelect('contact_sub_type:name')
      ->addWhere('id', '=', $contactId)
      ->execute()
      ->first();

    if (!empty($contact['contact_sub_type:name'])) {
      return $contact['contact_sub_type:name'];
    }

    return NULL;
  }

}
