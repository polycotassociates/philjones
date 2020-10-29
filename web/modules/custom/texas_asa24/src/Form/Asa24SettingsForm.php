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

    $config = $this->config('texas_asa24.credentials');  //since we are extending ConfigFormBase instead of FormBase, it gives use access to the config object
    $form['api_token'] = array(
      '#type' => 'textarea',
      '#description' => t('API Token'),
      '#title' => t('API Token'),
      '#default_value' => $config->get('api_token'),
    );
    $form['study_id'] = array(
      '#type' => 'textfield',
      '#description' => t('Study ID'),
      '#title' => t('Study ID'),
      '#default_value' => $config->get('study_id'),
    );
    $form['base_url'] = array(
      '#type' => 'textfield',
      '#description' => t('ASA24 Base URL'),
      '#title' => t('Base URL'),
      '#default_value' => $config->get('base_url'),
    );
    $form['user_prefix'] = array(
      '#type' => 'textfield',
      '#description' => t('Prefix for ASA24 unique user, to be prepended to pptid'),
      '#title' => t('User Prefix'),
      '#default_value' => $config->get('user_prefix'),
    );
    $form['redirect_url'] = array(
      '#type' => 'textfield',
      '#description' => t('Base URL for ASA24 redirect'),
      '#title' => t('Redirect URL'),
      '#default_value' => $config->get('redirect_url'),
    );
    $form['token_life'] = array(
      '#type' => 'textfield',
      '#description' => t('How long a JWT token lasts e.g. +3 month'),
      '#title' => t('JWT Token Life'),
      '#default_value' => $config->get('token_life'),
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
      ->set('study_id', $form_state->getValue('study_id'))
      ->set('base_url', $form_state->getValue('base_url'))
      ->set('token_life', $form_state->getValue('token_life'))
      ->set('redirect_url', $form_state->getValue('redirect_url'))
      ->set('user_prefix', $form_state->getValue('user_prefix'))
      ->save();
  }
}
