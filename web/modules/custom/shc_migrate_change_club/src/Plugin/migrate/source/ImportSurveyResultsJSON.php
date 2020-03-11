<?php

namespace Drupal\shc_migrate_change_club\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Provides a 'ImportSurveyResultsJSON' migrate source.
 *
 * @MigrateSource(
 *  id = "import_survey_results_json",
 *  source_module = "shc_migrate_change_club"
 * )
 */
class ImportSurveyResultsJSON extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('none', 'n')
      ->fields('n')
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
