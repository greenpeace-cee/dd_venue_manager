<?php

namespace Civi\DdVenueManager\Utils;

use http\Params;

/**
 * Adapter for CiviOffice functionality
 */
class CiviOffice {

  /**
   * @return array
   */
  public static function getDocumentRendererOptions(): array {
    if (!Extension::isCiviOfficeEnable()) {
      return [];
    }

    $config = \CRM_Civioffice_Configuration::getConfig();
    $documentRendererOptions = [];

    try {
      foreach ($config->getDocumentRenderers(true) as $dr) {
        $documentRendererOptions[$dr->getURI()] = $dr->getName();
      }
    } catch (\Exception $e) {
      return [];
    }

    return $documentRendererOptions;
  }

  /**
   * @return array
   */
  public static function getMimeTypeOptions(): array {
    if (!Extension::isCiviOfficeEnable()) {
      return [];
    }

    $config = \CRM_Civioffice_Configuration::getConfig();
    $mimeTypeOptions = [];

    try {
      foreach ($config->getDocumentRenderers(true) as $dr) {
        foreach ($dr->getType()->getSupportedOutputMimeTypes() as $mimeType) {
          $mimeTypeOptions[$mimeType] = \CRM_Civioffice_MimeType::mapMimeTypeToFileExtension($mimeType);
        }
      }
    } catch (\Exception $e) {
      return [];
    }

    return $mimeTypeOptions;
  }

  /**
   * @return array
   */
  public static function getDocumentOptions(): array {
    if (!Extension::isCiviOfficeEnable()) {
      return [];
    }

    $config = \CRM_Civioffice_Configuration::getConfig();
    $documentOptions = $config->getDocuments(true);

    if (empty($documentOptions)) {
      return [];
    }

    return $documentOptions;
  }

  /**
   * Download single document or archive of documents
   *
   * @param $storeUri
   * @throws \Exception
   */
  public static function downloadDocuments($storeUri) {
    if (!Extension::isCiviOfficeEnable()) {
      return;
    }

    if (empty($storeUri)) {
      throw new \Exception("Rendering Error! Empty store url!");
    }

    $store = \CRM_Civioffice_Configuration::getDocumentStore($storeUri);
    $documents = $store->getDocuments();

    if (count($documents) === 0) {
      throw new \Exception("Rendering Error! Cannot find eny rendered document!");
    } elseif (count($documents) === 1) {
      $documents = reset($documents);
      $documents->download();
    } elseif (count($documents) > 1) {
      $store->downloadZipped();
    } else {
      throw new \Exception("Rendering Error! Empty store url!");
    }
  }

}
