<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsImportParticipantController extends ControllerBase {
  public function content($responseids) {
    $markup = texas_migrate_programs_runner();
    $markup = $markup . texas_migrate_programs_import_responseid($responseids);
    return array('#markup' => $markup);
  }

}
