<?php

namespace Drupal\texas_asa24\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasAsa24Controller extends ControllerBase {
  public function content() {
    // get pptstring from config
    $config = \Drupal::config("texas_asa24.settings");
    $pptstring = $config->get("pptstring"); 
    return array('#markup' => texas_asa24_display($pptstring));
  }

}
