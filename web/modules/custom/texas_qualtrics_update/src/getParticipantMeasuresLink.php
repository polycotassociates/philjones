<?php

namespace Drupal\texas_qualtrics_update;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\user\Entity\User;

/**
 * extend Drupal's Twig_Extension class
 */
class getParticipantMeasuresLink extends \Twig_Extension
{

  /**
   * {@inheritdoc}
   * Let Drupal know the name of custom extension
   */
  public function getName()
  {
    return 'texas_qualtrics_update.get.measureslink';
  }


  /**
   * {@inheritdoc}
   * Return custom twig function to Drupal
   */
  public function getFunctions()
  {
    return [
      new \Twig_SimpleFunction('get_measures_link', [$this, 'get_measures_link']),
    ];
  }

  /**
   * Parses person JSON data into array for theming
   *
   * @param string $paraid
   *   paragraph id passed from field twig template
   *
   * @return array $measures_link
   *   data in array for theming
   */
  public function get_measures_link($paraid)
  {

    $measures_link = [];
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
        $measures_link = $user->get('field_data_collection_form')->uri;
      }
    }
    return $measures_link;
  }
}
