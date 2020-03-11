<?php

namespace Drupal\shc_migrate_change_club\Plugin\migrate_plus\data_parser;

use Drupal\migrate_plus\DataParserPluginBase;

/**
* Provides a 'ParseSurveyJSON' data parser plugin.
*
* @DataParser(
*  id = "parse_survey_json"
*  title = @Translation("parse_survey_json")
* )
*/
class ParseSurveyJSON extends DataParserPluginBase {

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
