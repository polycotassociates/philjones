<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Return list of programss enrolled keys.
 *
 * @MigrateProcessPlugin(
 *   id = "programs_enrolled",
 * )
 */
class ProgramsEnrolled extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {

    //take uri string from participant questionnaire and transform into array of values to be mapped to mapped to text list of program names
    //explode string
    $programs = explode('&', $value);
      //loop over array of program strings to see which are not N
      foreach ($programs as &$value) {
        // get everything after =
        $toggle =  ltrim(strstr($value, '='), '=');
        //filter out values we don't need
        if ($toggle == 'N') {
            $value = NULL;
          }else{
            $value = strtolower(substr($value, 0, strpos($value, '=')));
            $value = str_replace('-','_', $value);
          }
        }
    //remove nulls
    $programs = array_filter($programs);
    $value = $programs;
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid uri.');
    }
    return $value;
  }
}
