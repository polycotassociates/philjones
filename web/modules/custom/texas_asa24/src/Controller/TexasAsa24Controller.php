<?php

namespace Drupal\texas_asa24\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasAsa24Controller extends ControllerBase {
  public function content() {
    $user = 6009;
    return array('#markup' => texas_asa24_display($user));
  }

}
