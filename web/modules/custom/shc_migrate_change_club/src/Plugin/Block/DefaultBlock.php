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

    $progressid = shc_migrate_change_club_post_qualtrics();
    $build['default_block']['#markup'] =  $progressid;

    return $build;
  }

}
