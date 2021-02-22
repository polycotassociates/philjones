<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsController extends ControllerBase {
  public function content() {

  $markup = texas_migrate_programs_runner();
  $markup = $markup . '<p><a href="/texas_migrate_programs/import_participant_group/ResponseId" class="btn btn-info" role="button">Import a list of new participants by ResponseId</a></p>';
    return array('#markup' => $markup);
  }

}
