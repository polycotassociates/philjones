<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\taxonomy\Entity\Term;
use Drupal\user\Entity\User;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsAddProgramParticipantController extends ControllerBase {
  public function content($pid) {
    $markup = '';
    $uid = texas_migrate_programs_add_program_pptid($pid);
    if (!empty($uid)){
    $markup = $markup . '<p><a href="/user/'.$uid .'" class="btn btn-info" role="button">Return to this participant\'s dashboard</a></p>';
      }
    return array('#markup' => $markup);
  }

}
