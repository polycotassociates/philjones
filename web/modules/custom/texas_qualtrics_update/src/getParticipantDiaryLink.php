<?php

namespace Drupal\texas_qualtrics_update;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;

/**
 * extend Drupal's Twig_Extension class
 */
class getParticipantDiaryLink extends \Twig_Extension
{

  /**
   * {@inheritdoc}
   * Let Drupal know the name of custom extension
   */
  public function getName()
  {
    return 'texas_qualtrics_update.get.diarylink';
  }


  /**
   * {@inheritdoc}
   * Return custom twig function to Drupal
   */
  public function getFunctions()
  {
    return [
      new \Twig_SimpleFunction('get_diary_link', [$this, 'get_diary_link']),
    ];
  }

  /**
   * Parses person JSON data into array for theming
   *
   * @param string $paraid
   *   paragraph id passed from field twig template
   *
   * @return array $survey_link
   *   data in array for theming
   */
  public function get_diary_link($paraid)
  {

    $diary_link = [];
    $paragraph = Paragraph::load($paraid);

    if (!empty($paragraph)) {
      // get image path from json
      $pptid = $paragraph->get('field_participant_id')->value;
      $uids = \Drupal::entityQuery('user')
      ->condition('field_response_id', $pptid)
      ->execute();

    foreach($uids as $uid)
      {
        $uid = $uid;
        $user = User::load($uid);
        //dump($user);
        $diary_link = $user->get('field_asa_24')->uri;
      }
    }
    return $diary_link;
  }
}
