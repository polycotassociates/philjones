<?php

namespace Drupal\shc_migrate_change_club\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Provides a 'ShcMigrateChangeClub' migrate process plugin.
 *
 * @MigrateProcessPlugin(
 *  id = "shc_migrate_change_club"
 * )
 */
class ShcMigrateChangeClub extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Plugin logic goes here.
  }

}
