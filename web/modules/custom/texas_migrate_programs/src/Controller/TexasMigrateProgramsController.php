<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsController extends ControllerBase {
  public function content() {

  $markup = texas_migrate_programs_runner();
  $markup = $markup . '<p><a href="/texas_migrate_programs/import_participant/ResponseId" class="btn btn-info" role="button">Import a list of new participants</a></p>';
  $markup = $markup . '<p><a href="/texas_migrate_programs/update_participant/cwwd/ResponseId" class="btn btn-info" role="button">Add an existing participant to CWWD</a></p>';
  $markup = $markup . '<p><a href="/texas_migrate_programs/update_participant/dep_f/ResponseId" class="btn btn-info" role="button">Add an existing participant to DEP</a></p>';
  $markup = $markup . '<p><a href="/texas_migrate_programs/update_participant/map/ResponseId" class="btn btn-info" role="button">Add an existing participant to MAP</a></p>';
  $markup = $markup . '<p><a href="/texas_migrate_programs/update_participant/susd_f/ResponseId" class="btn btn-info" role="button">Add an existing participant to SUSD</a></p>';
  $markup = $markup . '<p><a href="/texas_migrate_programs/update_participant/wat/ResponseId" class="btn btn-info" role="button">Add an existing participant to WAT</a></p>';
    return array('#markup' => $markup);
  }

}
