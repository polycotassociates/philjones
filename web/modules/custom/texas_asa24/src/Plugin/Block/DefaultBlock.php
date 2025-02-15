<?php

namespace Drupal\texas_asa24\Plugin\Block;

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
    //fire qulatrics download function
    // get pptstring from config
    $config = \Drupal::config("texas_asa24.settings");
    $pptstring = $config->get("pptstring");
    $build['default_block']['#markup'] = texas_asa24_display($pptstring);
    return $build;
  }

}
