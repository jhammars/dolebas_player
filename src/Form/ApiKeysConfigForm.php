<?php

namespace Drupal\dolebas_player\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ApiKeysConfigForm.
 *
 * @package Drupal\dolebas_player\Form
 */
class ApiKeysConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'dolebas_player.api_keys',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'api_keys_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dolebas_player.api_keys');
    $form['cloudinary_cloud_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Cloudinary Cloud Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('cloudinary_cloud_name'),
    ];
    $form['cloudinary_auth_username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Cloudinary Auth Username (Api Key)'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('cloudinary_auth_username'),
    ];
    $form['cloudinary_auth_password'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Cloudinary Auth Password (Api Secret)'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('cloudinary_auth_password'),
    ];
    $form['wistia_auth_username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Wistia Auth Username'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('wistia_auth_username'),
    ];
    $form['wistia_auth_password'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Wistia Auth Password (Api Token)'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('wistia_auth_password'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('dolebas_player.api_keys')
      ->set('cloudinary_cloud_name', $form_state->getValue('cloudinary_cloud_name'))
      ->save();
    $this->config('dolebas_player.api_keys')
      ->set('cloudinary_auth_username', $form_state->getValue('cloudinary_auth_username'))
      ->save();
    $this->config('dolebas_player.api_keys')
      ->set('cloudinary_auth_password', $form_state->getValue('cloudinary_auth_password'))
      ->save();
    $this->config('dolebas_player.api_keys')
      ->set('wistia_auth_username', $form_state->getValue('wistia_auth_username'))
      ->save();
    $this->config('dolebas_player.api_keys')
      ->set('wistia_auth_password', $form_state->getValue('wistia_auth_password'))
      ->save();
  }

}
