<?php

namespace Drupal\shc_migrate_survey_results\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Provides a 'ShcMigrateSurveyResults' migrate source.
 *
 * @MigrateSource(
 *  id = "shc_migrate_survey_results",
 *  source_module = "shc_migrate_survey_results"
 * )
 */
class ShcMigrateSurveyResults extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('surveydata', 's')
      ->fields('s')
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
