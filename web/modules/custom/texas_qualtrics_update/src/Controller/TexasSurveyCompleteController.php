<?php

namespace Drupal\texas_qualtrics_update\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasSurveyCompleteController extends ControllerBase {
  public function content($pptstring) {
    $markup = '';
    $timepointid = 30;
    // get pptid out of string
    $pptid = ltrim(strstr($pptstring, '='), '=');
    // get user id from pptid and add to link
    $uids = \Drupal::entityQuery('user')
      ->condition('field_response_id', $pptid)
      ->execute();
    if (!empty($uids)){
      foreach($uids as $uid)
        {
          $user = User::load($uid);
          $username = $user->get('field_displa')->value;
        }

        // get paragraph ids filtered by pptid and timepoint
        $pids = \Drupal::entityQuery('paragraph')
          //->condition('type', $paragraphid)
          ->condition('field_participant_id', $pptid)
          ->condition('field_timepoint', $timepointid)
          ->condition('field_survey_completed', 0)
          ->execute();
          // loop through paragraphs and update
          foreach($pids as $pid) {
            $paragraph = Paragraph::load($pid);
            $paragraph_field_value = $paragraph->get('field_survey_completed')->value;
             var_dump($paragraph_field_value);
            // Update field_survey_complete to true.
            $paragraph->set('field_survey_completed', 1);
            // Save the Paragraph.
            $paragraph->save();
            //$debug = $debug . '<ul><li>Timepoint ID: '. $timepointid.'</li><li>Paragraph ID: '.$pid .'</li><li>field_survey_completed value was: '.$paragraph_field_value.'</li></ul>';
          }
        //$markup = '<ul><li>Participant ID: '.$pptid .'</li><li>User ID: '.$uid .'</li>' .$debug. '</ul>';
        $markup = $markup . '<p>Thank you for completing the online Health Survey, participant <strong>'.$username.'</strong> has now been updated.</p>';
        $markup = $markup . '<a href="/user/'.$uid .'" class="btn btn-info" role="button">Return to this participant\'s dashboard</a>';
      }else{
        $markup = $markup . '<p>No active user account found for pptid <strong>'.$pptid.'</strong>.</p>';
      }
    return array('#markup' => $markup );
  }

}
