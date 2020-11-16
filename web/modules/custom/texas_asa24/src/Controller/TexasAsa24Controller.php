<?php

namespace Drupal\texas_asa24\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasAsa24Controller extends ControllerBase {
  public function content() {
    $pptstring = 'ID=1256&DEP-F=12W&DEP-L=N&SUSD-F=N&SUSD-L=N&CWWD=B&MAP=N&HTDS-F=N&HTDS-L=N&WAT=N';
    return array('#markup' => texas_asa24_display($pptstring));
  }

}
