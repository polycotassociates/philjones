<?php

namespace Drupal\texas_asa24\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasAsa24UpdateController extends ControllerBase {
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
          ->condition('field_asa_24_complete', 0)
          ->execute();
          // loop through paragraphs and update
          foreach($pids as $pid) {
            $paragraph = Paragraph::load($pid);
            $paragraph_field_value = $paragraph->get('field_asa_24_complete')->value;
            // Update field_asa_24_complete to true.
            $paragraph->set('field_asa_24_complete', 1);
            // Save the Paragraph.
            $paragraph->save();
            //$debug = $debug . '<li>Program: '. $program.'</li><li>Paragraph: '. $paragraphid.'</li><li>Timepoint: '. $timepoint.'</li><li>Timepoint ID: '. $timepointid.'</li><li>Paragraph ID '.$pid .'</li><li>Field Value '.$paragraph_field_value.'</li>';
          }
          //$markup = '<ul><li>Participant ID: '.$pptid .'</li><li>User ID: '.$uid .'</li><ul>' .$debug. '</ul></ul>';
          $markup = $markup . '<p>Thank you for completing your online Food Diary, <strong>'.$username.'</strong> has now been updated</p>';
          $markup = $markup . '<a href="/user/'.$uid .'" class="btn btn-info" role="button">Return to this participant\'s dashboard</a>';
      }else{
          $markup = $markup . '<p>No active user account found for pptid <strong>'.$pptid.'</strong>.</p>';
      }
    return array('#markup' => $markup );
  }

}
