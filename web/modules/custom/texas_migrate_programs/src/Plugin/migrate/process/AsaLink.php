<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Generate JWT and link for ASA24 participant questionnaire.
 *
 * @MigrateProcessPlugin(
 *   id = "asa_link",
 * )
 */
class AsaLink extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {

      // send pptstring
      if (!empty($value)) {
      $pptstring = $value;
      $asa_link = texas_asa24_generate_jwt($pptstring);
      //$value = $asa_link;
    }
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid pptid.');
    }
    return $asa_link;
  }
}
