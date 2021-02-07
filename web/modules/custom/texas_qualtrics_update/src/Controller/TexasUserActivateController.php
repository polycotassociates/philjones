<?php

namespace Drupal\texas_qualtrics_update\Controller;
use Drupal\Core\Controller\ControllerBase;
// use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasUserActivateController extends ControllerBase {
  public function content($pptstring) {
    $markup = '';
    //$timepointid = 30;
    // get pptid out of string
    $pptid = ltrim(strstr($pptstring, '='), '=');
    // get user id from pptid and add to link
    $uids = \Drupal::entityQuery('user')
      ->condition('field_response_id', $pptid)
      //->condition('status', 1)
      ->execute();
    if (!empty($uids)){
    foreach($uids as $uid)
      {
        $user = User::load($uid);
        //var_dump($user);
        // Get user display name
        $username = $user->get('field_displa')->value;
        // Update user status to true.
        $user->set('status', 1);
        // Save the user.
        $user->save();
      }
    //$markup = '<ul><li>Participant ID: '.$pptid .'</li><li>User ID: '.$uid .'</li>' .$debug. '</ul>';
    $markup = $markup . '<p>The portal user account for <strong>'.$username.'</strong> has been activated.</p>';
    $markup = $markup . '<a href="/user/'.$uid .'" class="btn btn-info" role="button">Go to this participant\'s dashboard</a>';
    }else{
      $markup = $markup . '<p>No inactive user account found for pptid <strong>'.$pptid.'</strong>.</p>';
    }


    return array('#markup' => $markup );
  }

}
