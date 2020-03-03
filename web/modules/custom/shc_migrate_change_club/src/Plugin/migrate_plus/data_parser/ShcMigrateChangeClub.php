<?php

namespace Drupal\shc_migrate_change_club\Plugin\migrate_plus\data_parser;

use Drupal\migrate_plus\DataParserPluginBase;

/**
* Provides a 'ShcMigrateChangeClub' data parser plugin.
*
* @DataParser(
*  id = "shc_migrate_change_club"
*  title = @Translation("shc_migrate_change_club")
* )
*/
class ShcMigrateChangeClub extends DataParserPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function openSourceUrl($url) {
    // Plugin logic goes here.
  }

  /**
   * {@inheritdoc}
   */
  protected function fetchNextRow() {
    // Plugin logic goes here.
  }

}
