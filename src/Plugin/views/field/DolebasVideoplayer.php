<?php

namespace Drupal\dolebas_player\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Random;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("dolebas_videoplayer")
 */
class DolebasVideoplayer extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {

    // TODO: get hid from view nid or uuid
    
    $uuid = strip_tags($this->view->field['uuid']->original_value);
    
    $config = \Drupal::config('dolebas_config.config');
    $wistia_usr = $config->get('wistia_auth_username');
    $wistia_pwd = $config->get('wistia_auth_password');
    
    $client1 = \Drupal::httpClient();
    $request1 = $client1->get('https://api.wistia.com/v1/medias.json?name=' . $uuid, [
      'auth' => [$wistia_usr,$wistia_pwd]
    ]);
    $response1 = json_decode($request1->getBody(),true);
    $hid = $response1[0]['hashed_id'];
    
    // $hid = '247kulfafh';
    
    $frontpage_video_id = 'wistia_embed wistia_async_' . $hid . '';

    return [
      '#theme' => 'dolebas_videoplayer',
      '#frontpage_video_id' => $frontpage_video_id,
      '#attached' => array(
        'library' =>  array(
          'dolebas_player/dolebas-videoplayer',
        ),
        'drupalSettings' => array(
          'frontpage_hid' => $hid
        ),
      ),
    ];

  }

}
