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
 *   id = "langlink",
 * )
 */
class Langlink extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {
      if (is_numeric($value)) {
        if ($value === 1){
          $langlink = 'E';
        }
        if ($value === 2){
          $langlink = 'S';
        }
      }
      else {
        $langlink = 'F';
      }
      $value = $langlink;
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid source language code.');
    }
    return $value;
  }
}
