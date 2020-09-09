<?php
namespace Drupal\texas_asa24\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\MapArray;


class Asa24SettingsForm extends ConfigFormBase {

    /**
    *array An array of configuration object names that are editable
	*/
   protected function getEditableConfigNames() {
   return ['texas_asa24.credentials'];
  }

   public function getFormID() {
    return 'asa24_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('texas_asa24.credentials');  //since we are extending ConfigFormBase instaad of FormBase, it gives use access to the config object
    $form['api_token'] = array(
      '#type' => 'textfield',
      '#description' => t('API Token'),
      '#title' => t('API Token'),
      '#default_value' => $config->get('api_token'),
    );
    return parent::buildForm($form,$form_state);
  }

  /**
   * Form submission handler.
   *
   *  $form -> An associative array containing the structure of the form.
   *  $form_state -> An associative array containing the current state of the form.
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('texas_asa24.credentials')
      ->set('api_token', $form_state->getValue('api_token'))
      ->save();
  }
}
