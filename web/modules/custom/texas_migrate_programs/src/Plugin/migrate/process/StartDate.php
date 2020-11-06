<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Compile start dates into array and extract first one
 *
 * @MigrateProcessPlugin(
 *   id = "start_date",
 * )
 */
class StartDate extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {

    //take uri string from participant questionnaire and transform into array of values to be mapped to mapped to text list of program names
    //explode string
    $dates = explode('&', $value);
    //remove nulls
    $dates = array_filter($programs);
    $date = min($dates);
    $value = $date;
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid string of dates.');
    }
    return $value;
  }
}
