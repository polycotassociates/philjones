<?php

namespace Drupal\texas_qualtrics_update\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\paragraphs\Entity\Paragraph;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasSurveyCompleteController extends ControllerBase {
  public function content($pptstring) {
    // programs that have field_survey_completed
    $surveyprogs = array('cwwd', 'dep_f', 'htds_f', 'map', 'susd_f', 'susd_l', 'wat');
    // break string into pptid and timepoints
    $splits = explode('&', $pptstring);
    $pptid = ltrim(strstr(array_shift($splits), '='), '=');
    // get user id from pptid and add to link
    $uids = \Drupal::entityQuery('user')
      ->condition('field_response_id', $pptid)
      ->execute();
    foreach($uids as $uid)
      {
        $uid = $uid;
      }
    foreach ($splits as $split) {
      $program = str_replace('-', '_',explode('=', $split, 2));
      $program = strtolower($program[0]);
      $timepoint = ltrim(strstr($split, '='), '=');
      // map to timepoint term id
      // check to see if it's a program with asa24
      foreach ($surveyprogs as $p ) {
      if (strpos ($program , $p ) !== FALSE ) {
        // append rest of paragraph id
        $paragraphid = $program .'_timepoint';
        if(strpos($timepoint, 'N') !== true) {
          if ($timepoint == 'B'){
            $timepointid = 30;
          }
        if ($timepoint == '12W'){
            $timepointid = 74;
          }
        if ($timepoint == '24W'){
            $timepointid = 75;
          }
        if ($timepoint == '36W'){
            $timepointid = 76;
          }
        if ($timepoint == '48W'){
            $timepointid = 77;
          }
      // get paragraph ids filtered by pptid and timepoint
      $pids = \Drupal::entityQuery('paragraph')
        ->condition('type', $paragraphid)
        ->condition('field_participant_id', $pptid)
        ->condition('field_timepoint', $timepointid)
        ->execute();
        // loop through paragraphs and update
        foreach($pids as $pid) {
          $paragraph = Paragraph::load($pid);
          $paragraph_field_value = $paragraph->get('field_survey_completed')->value;
          // var_dump($paragraph_field_value);
          // Update field_survey_complete to true.
          $paragraph->set('field_survey_completed', 1);
          // Save the Paragraph.
          $paragraph->save();
          //$debug = $debug . '<li>Program: '. $program.'</li><li>Paragraph: '. $paragraphid.'</li><li>Timepoint: '. $timepoint.'</li><li>Timepoint ID: '. $timepointid.'</li><li>Paragraph ID '.$pid .'</li><li>field_survey_completed Value '.$paragraph_field_value.'</li>';

        }
        }
      }
    }
  }

    $markup = '<ul><li>Participant ID: '.$pptid .'</li><li>User ID: '.$uid .'</li><ul>' .$debug. '</ul></ul>';
    $markup = $markup . '<p>Thank you for completing your online Health Survey, your record has now been updated</p>';
    $markup = $markup . '<a href="/user/'.$uid .'" class="btn btn-info" role="button">Return to this participant\'s dashboard</a>';
    return array('#markup' => $markup );
  }

}
