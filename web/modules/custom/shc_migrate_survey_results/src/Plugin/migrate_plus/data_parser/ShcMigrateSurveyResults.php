<?php

namespace Drupal\shc_migrate_survey_results\Plugin\migrate_plus\data_parser;

use Drupal\migrate_plus\DataParserPluginBase;

/**
* Provides a 'ShcMigrateSurveyResults' data parser plugin.
*
* @DataParser(
*  id = "shc_migrate_survey_results"
*  title = @Translation("shc_migrate_survey_results")
* )
*/
class ShcMigrateSurveyResults extends DataParserPluginBase {

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
