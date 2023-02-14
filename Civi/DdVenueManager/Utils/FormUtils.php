<?php

namespace Civi\DdVenueManager\Utils;

class FormUtils {

  /**
   * @param $formElement
   * @param $value
   * @return bool
   */
  public static function isSelectValueExist($formElement, $value) {
    if (empty($formElement->_options)) {
      return false;
    }

    foreach ($formElement->_options as $option) {
      if ($option['attr']['value'] === $value) {
        return true;
      }

    }

    return false;
  }

}
