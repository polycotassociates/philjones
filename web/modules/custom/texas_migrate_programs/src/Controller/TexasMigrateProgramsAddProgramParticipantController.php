<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsAddProgramParticipantController extends ControllerBase {
  public function content($pptid) {
  //$pptid = '';
  // get user id, full name from user entity query
  $uids = \Drupal::entityQuery('user')
    ->condition('field_response_id', $pptid)
    ->execute();
  if (!empty($uids)){
    foreach($uids as $uid)
      {
        $user = User::load($uid);
        $name = $user->get('field_displa')->value;
        $userid = $uid;

      }
}

  // get response id from user migration map
  //$responseid = 'R_AG1sXtiBV4590hb';
  $query = \Drupal::database()->select('migrate_map_texas_a_user', 'm');
  $query->addField('m', 'sourceid1');
  $query->condition('m.destid1', $uid);
  $query->range(0, 1);
  $responseid = $query->execute()->fetchField();
  //start date and program from form
  $startdate = '02/06/2021';
  $program = 'susd_f';

  $data = [
    ['responseId' => $responseid, 'field_response_id' => $pptid, 'name' => $name, 'field_program_type' => $startdate, 'field_start_date' => $startdate, 'program' => $program, 'pptid' => $pptid],
    ];
    $markup = $markup . texas_migrate_programs_add_program_pptid($data);
    $markup = $markup . '<p><a href="/user/'.$uid .'" class="btn btn-info" role="button">Return to this participant\'s dashboard</a></p>';
    //return array('#markup' => 'meep');
    return array('#markup' => $markup);
  }

}
