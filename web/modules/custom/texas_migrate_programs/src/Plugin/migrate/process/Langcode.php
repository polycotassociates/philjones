<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Format baseline start date.
 *
 * @MigrateProcessPlugin(
 *   id = "langcode",
 * )
 */
class Langcode extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {
      if (is_numeric($value)) {
        if ($value === 1){
          $langcode = 'en';
        }
        if ($value === 2){
          $langcode = 'es';
        }
      }
      else {
        $langcode = 'fr';
      }
      $value = $langcode;
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid source language code.');
    }
    return $value;
  }
}
