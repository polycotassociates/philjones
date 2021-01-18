<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Format outcome start date - baseline plus 12 weeks.
 *
 * @MigrateProcessPlugin(
 *   id = "timepoint_link",
 * )
 */
class TimepointLink extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {

      //date is 9/15/2020
      //$date = $value;
      // build some dates
      //$date = $date->format('Y-m-d');
      //$now = date('Y-m-d');
      //$now = date_create();
      //$now = date_timestamp_get($date);


      // set some values
      if (!empty($value)) {
      // this logic moved to field template to rewrite link there
      //$date = strtotime($value);
      //$timepoint_link = '48W';
      //if($date >= strtotime('-48 week')){
        //$timepoint_link = '36W';
      //}
      //if($date >= strtotime('-36 week')){
        //$timepoint_link = '24W';
      //}
      //if($date >= strtotime('-24 week')){
        //$timepoint_link = '12W';
      //}
      //if($date >= strtotime('-12 week')){
        $timepoint_link = 'B';
      //}



       }else{
      $timepoint_link = 'N';
      }

      $value = $timepoint_link;
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid source date.');
    }
    return $value;
  }
}
