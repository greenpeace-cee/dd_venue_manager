<?php

use Civi\DdVenueManager\Utils\AfformLoader;
use CRM_DdVenueManager_ExtensionUtil as E;

class CRM_DdVenueManager_Page_TestAfform extends CRM_Core_Page {

  public function run() {
    CRM_Utils_System::setTitle(E::ts('TestAfform'));

    $name = 'afsearchVenueAttachments';
    $afformLoader = new AfformLoader($name, ['contact_id' => 2]);
    $afformTemplate = $afformLoader->getTemplate();
    $afformLoader->loadAngularjsModule();
    $this->assign('afformTemplate', $afformTemplate);

    parent::run();
  }

}
