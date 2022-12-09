<?php

use Civi\DdVenueManager\Utils\Activity;
use Civi\DdVenueManager\Utils\CiviOffice;
use Civi\DdVenueManager\Utils\Extension;
use CRM_DdVenueManager_ExtensionUtil as E;

class CRM_DdVenueManager_Form_CreateCaseActivityCiviOfficeDocument extends CRM_Core_Form {

  /**
   * @var int
   */
  protected $caseId;

  /**
   * @var int
   */
  protected $activityId;

  public function preProcess() {
    parent::preProcess();
    $this->activityId = CRM_Utils_Request::retrieve('activity_id', 'Int', $this, true);
    if (empty($this->activityId)) {
      throw new Exception('"activity_id" is required param!');
    }

    $this->caseId = Activity::getActivityCaseId($this->activityId);
    if (empty($this->caseId)) {
      throw new Exception('The activity(id=' . $this->activityId . ') doen\'t have related case.');
    }

    if (!Extension::isCiviOfficeEnable()) {
      throw new Exception('Please enable "de.systopia.civioffice" extension.');
    }
  }

  public function buildQuickForm() {
    $this->setTitle(E::ts('Generate Case Activity CiviOffice Document'));
    $documentRendererOptions = CiviOffice::getDocumentRendererOptions();
    $mimeTypeOptions = CiviOffice::getMimeTypeOptions();
    $documentOptions= CiviOffice::getDocumentOptions();

    $this->add('select', 'document_renderer_uri', E::ts("Document Renderer"), $documentRendererOptions, true, ['class' => 'crm-select2 huge']);
    $this->add('select2', 'document_uri', E::ts("Document"), $documentOptions, true, ['class' => 'huge', 'placeholder' => E::ts('- select -'),]);
    $this->add('select', 'target_mime_type', E::ts("Target document type"), $mimeTypeOptions, true, ['class' => 'crm-select2']);
    $this->addButtons([
      [
        'type' => 'submit',
        'name' => E::ts('Download Document'),
        'isDefault' => TRUE,
      ],
      [
        'type' => 'cancel',
        'name' => E::ts('Back to the manage case'),
        'class' => 'cancel',
      ]
    ]);
  }

  public function postProcess() {
    $values = $this->exportValues();

    $renderResult = civicrm_api3('CiviOffice', 'convert', [
      'document_uri' => $values['document_uri'],
      'entity_ids' => [$this->activityId],
      'entity_type' => 'activity',
      'renderer_uri' => $values['document_renderer_uri'],
      'target_mime_type' => $values['target_mime_type'],
    ]);

    if (empty($renderResult['values'][0])) {
      throw new Exception(E::ts("Rendering Error! Cannot find store uri!"));
    }

    $storeUri = $renderResult['values'][0];
    CiviOffice::downloadDocuments($storeUri);

    parent::postProcess();
  }

  public function cancelAction() {
    $activityId = CRM_Utils_Request::retrieve('activity_id', 'Int', $this, true);
    if (empty($activityId)) {
      CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/case/search', []));
    }

    $caseId = Activity::getActivityCaseId($activityId);
    if (empty($caseId)) {
      CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/case/search', []));
    }

    $urlParams = [
      'action' => 'view',
      'cid' => CRM_Core_Session::singleton()->getLoggedInContactID(),
      'id' => $caseId,
    ];

    CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/contact/view/case', $urlParams));
  }

}
