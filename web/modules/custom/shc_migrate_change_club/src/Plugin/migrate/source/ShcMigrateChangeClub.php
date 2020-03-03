<?php

namespace Drupal\shc_migrate_change_club\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Provides a 'ShcMigrateChangeClub' migrate source.
 *
 * @MigrateSource(
 *  id = "shc_migrate_change_club",
 *  source_module = "shc_migrate_change_club"
 * )
 */
class ShcMigrateChangeClub extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('change_club', 'c')
      ->fields('c')
;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [];
  }

}
