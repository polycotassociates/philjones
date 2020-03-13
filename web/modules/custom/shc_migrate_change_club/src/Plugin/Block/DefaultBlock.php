<?php

namespace Drupal\shc_migrate_change_club\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'default_block';
    $config = \Drupal::config('shc_migrate_change_club.credentials');
    $settings = array();
    $settings['api_token'] = $config->get('api_token');
    $settings['data_center'] = $config->get('data_center');
    $settings['survey_id'] = $config->get('survey_id');

    $progressid = shc_migrate_change_club_post_qualtrics($settings);

    //$fileid = shc_migrate_change_club_get_qualtricsfileid($settings, $progressid);

    //$filedownload = shc_migrate_change_club_get_qualtricsfile($settings, $fileid);


    //$build['default_block']['#markup'] = $settings['api_token'];
    //$build['default_block']['#markup'] = $build['default_block']['#markup'] ."  ". $settings['data_center'];
    //$build['default_block']['#markup'] =  $progressid."  ". $fileid;

    return $build;
  }

}
