<?php

use Civi\DdVenueManager\Utils\RelationshipType;

/**
 * This form uses to extend core Relationship form.
 * The main goal is to fill 'case_id' field at 'civicrm_relationship' table.
 * Some methods are copied and overridden without any changes.
 */
class CRM_DdVenueManager_Form_VenueContactPersonRelationship extends CRM_Contact_Form_Relationship {

  public function buildQuickForm() {
    parent::buildQuickForm();
    $uFGroup = \Civi\Api4\UFGroup::get(FALSE)
      ->addSelect('id')
      ->addWhere('name', '=', 'Venue_Contact_Person')
      ->execute()
      ->first();
    $this->getElement('related_contact_id')->setAttribute('data-create-links', json_encode([
      [
        'url' => CRM_Utils_System::url('civicrm/profile/create', [
          'gid' => $uFGroup['id'],
          'reset' => 1
        ]),
        'label' => 'New Venue Contact Person',
      ]
    ]));
  }

  public function preProcess() {
    // huck to fix errors when parent form call the methods:
    // $this->get('contactId') and $this->get('id')
    $contactId = CRM_Utils_Request::retrieve('cid', 'Integer', $this);
    $relationshipId = CRM_Utils_Request::retrieve('id', 'Integer', $this);
    $this->set('contactId', $contactId);
    $this->set('id', $relationshipId);

    parent::preProcess();
  }

  public function postProcess() {
    parent::postProcess();

    $contactId = CRM_Utils_Request::retrieve('cid', 'Integer', $this);
    $caseId = CRM_Utils_Request::retrieve('caseID', 'Integer', $this);
    $session = CRM_Core_Session::singleton();
    $session->replaceUserContext(CRM_Utils_System::url('civicrm/contact/view/case', 'reset=1&action=view&cid=' . $contactId . '&id=' . $caseId));
  }

  public function setDefaultValues() {
    $defaults = parent::setDefaultValues();

    if ($this->getAction() == CRM_Core_Action::ADD || $this->getAction() == CRM_Core_Action::UPDATE) {
      $relationshipTypeIdElement = $this->getElement('relationship_type_id');
      $venueContactPersonRelationshipTypeId = RelationshipType::getVenueContactPersonRelationTypeId();
      $ABValue = $venueContactPersonRelationshipTypeId . '_a_b';
      $BAValue = $venueContactPersonRelationshipTypeId . '_b_a';

      if (Civi\DdVenueManager\Utils\FormUtils::isSelectValueExist($relationshipTypeIdElement, $ABValue)) {
        $defaults['relationship_type_id'] = $ABValue;
      } elseif (Civi\DdVenueManager\Utils\FormUtils::isSelectValueExist($relationshipTypeIdElement, $BAValue)) {
        $defaults['relationship_type_id'] = $BAValue;
      }
    }

    if ($this->getAction() == CRM_Core_Action::UPDATE) {
      $defaults['is_permission_a_b'] = $this->_values['is_permission_a_b'];
      $defaults['is_permission_b_a'] = $this->_values['is_permission_b_a'];
    }

    return $defaults;
  }

  /**
   * The method is copied to fill 'case_id' field at 'civicrm_relationship' table.
   * Added couple line of code.
   *
   * The method is copied from parent
   * This code is got from CiviCRM 5.51.3
   * See: civicrm/CRM/Contact/Form/Relationship.php
   *
   * @param array $values
   *
   * @return array
   */
  private function preparePostProcessParameters($values) {
    $params = $values;
    list($relationshipTypeId, $a, $b) = explode('_', $params['relationship_type_id']);

    $params['relationship_type_id'] = $relationshipTypeId;
    $params['contact_id_' . $a] = $this->_contactId;

    if (empty($this->_relationshipId)) {
      $params['contact_id_' . $b] = explode(',', $params['related_contact_id']);
    }
    else {
      $params['id'] = $this->_relationshipId;
      $params['contact_id_' . $b] = $params['related_contact_id'];
    }

    // If this is a b_a relationship these form elements are flipped
    $params['is_permission_a_b'] = CRM_Utils_Array::value("is_permission_{$a}_{$b}", $values, 0);
    $params['is_permission_b_a'] = CRM_Utils_Array::value("is_permission_{$b}_{$a}", $values, 0);

    // this code are added:
    if ($this->getAction() == CRM_Core_Action::ADD) {
      $caseId = CRM_Utils_Request::retrieve('caseID', 'Integer', $this);
      if (!empty($caseId)) {
        $params['case_id'] = $caseId;
      }
    }
    // end of added code

    return [$params, $a];
  }

  /**
   * The method is copied from parent form without any changes.
   * This code is got from CiviCRM 5.51.3
   * See: civicrm/CRM/Contact/Form/Relationship.php
   *
   * @param array $params
   *
   * @return array
   */
  public function submit($params) {
    switch ($this->getAction()) {
      case CRM_Core_Action::DELETE:
        $this->deleteAction($this->_relationshipId);
        return [];

      case CRM_Core_Action::UPDATE:
        return $this->updateAction($params);

      default:
        return $this->createAction($params);
    }
  }

  /**
   * The method is copied from parent form without any changes.
   * This code is got from CiviCRM 5.51.3
   * See: civicrm/CRM/Contact/Form/Relationship.php
   *
   * @param array $params
   *
   * @return array
   */
  private function updateAction($params) {
    list($params, $_) = $this->preparePostProcessParameters($params);

    unset($params['contact_id_b']);// to prevent error api3

    try {
      civicrm_api3('relationship', 'create', $params);
    }
    catch (CiviCRM_API3_Exception $e) {
      throw new CRM_Core_Exception('Relationship create error ' . $e->getMessage());
    }

    $this->setMessage(['saved' => TRUE]);
    return [$params, [$this->_relationshipId]];
  }

  /**
   * The method is copied from parent form without any changes.
   * This code is got from CiviCRM 5.51.3
   * See: civicrm/CRM/Contact/Form/Relationship.php
   *
   * @param array $params
   *
   * @return array
   */
  private function createAction($params) {
    list($params, $primaryContactLetter) = $this->preparePostProcessParameters($params);

    $outcome = CRM_Contact_BAO_Relationship::createMultiple($params, $primaryContactLetter);

    $relationshipIds = $outcome['relationship_ids'];

    $this->setMessage($outcome);

    return [$params, $relationshipIds];
  }

  /**
   * The method is copied from parent form without any changes.
   * This code is got from CiviCRM 5.51.3
   * See: civicrm/CRM/Contact/Form/Relationship.php
   *
   * @param $id
   */
  private function deleteAction($id) {
    CRM_Contact_BAO_Relationship::del($id);

    // reload all blocks to reflect this change on the user interface.
    $this->ajaxResponse['reloadBlocks'] = ['#crm-contactinfo-content'];
  }

}
