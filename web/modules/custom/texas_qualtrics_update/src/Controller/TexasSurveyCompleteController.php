<?php

namespace Drupal\texas_qualtrics_update\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;
use Drupal\Core\Datetime\DrupalDateTime;
/**
 *Get $pptstring from router and lookup relevant timepoint paragraphs for all programs with 'survey complete'.  Set survey complete for all current timepoints for a given pptid.
 */
class TexasSurveyCompleteController extends ControllerBase {
  public function content($pptstring) {
    $markup = '';
    // use static timepoint returned from Qualtrics DEPRECATED
    //set to baseline as default
    //$timepointid = 30;
    $now = new DrupalDateTime('now');
    $now->setTimezone(new \DateTimeZone(DATETIME_STORAGE_TIMEZONE));
    // start date is not more than 90 days ago to avoid marking previous timepoints complete
    $datewindow = new DrupalDateTime('-90 days');
    $datewindow->setTimezone(new \DateTimeZone(DATETIME_STORAGE_TIMEZONE));
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
          // use static timepoint returned from Qualtrics DEPRECATED
          //->condition('field_timepoint', $timepointid)
          ->condition('field_start_date', $now->format(DATETIME_DATETIME_STORAGE_FORMAT), '<')    // start date was before now
          ->condition('field_start_date', $datewindow->format(DATETIME_DATETIME_STORAGE_FORMAT), '>')     // start date is after now -90 days
          ->condition('field_survey_completed', 0)    //survey has not been marked complete
          ->execute();
          // loop through paragraphs and update
          foreach($pids as $pid) {
            $paragraph = Paragraph::load($pid);
            $paragraph_field_value = $paragraph->get('field_survey_completed')->value;
            $paragraph_date_value = $paragraph->get('field_start_date')->value;
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
