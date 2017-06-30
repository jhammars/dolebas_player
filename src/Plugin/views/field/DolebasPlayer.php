<?php

/**
 * @file
 * Definition of Drupal\dolebas_player\Plugin\views\field\DolebasPlayer.
 */

namespace Drupal\dolebas_player\Plugin\views\field;

use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Field handler to display player.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("dolebas_player")
 */
class DolebasPlayer extends FieldPluginBase {

  /**
   * @{inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {

    $view_nid = strip_tags($this->view->field['nid']->original_value);
    if ($view_nid) {
      $nid = $view_nid;
    }
    else {
      $nid = NULL;
    }

    $config = \Drupal::config('dolebas_player.api_keys');
    $cloudinary_usr = $config->get('cloudinary_auth_username');
    $cloudinary_pwd = $config->get('cloudinary_auth_password');
    $wistia_usr = $config->get('wistia_auth_username');
    $wistia_pwd = $config->get('wistia_auth_password');

    $client2 = \Drupal::httpClient();
    $request2 = $client2->get('https://api.cloudinary.com/v1_1/dolebas/resources/image/upload/?public_ids[]=' . $nid, [
      'auth' => [$cloudinary_usr,$cloudinary_pwd]
    ]);
    $response2 = json_decode($request2->getBody(),true);
    $thumb_url = $response2['resources'][0]['url'];

    $client1 = \Drupal::httpClient();
    $request1 = $client1->get('https://api.wistia.com/v1/medias.json?name=' . $nid, [
      'auth' => [$wistia_usr,$wistia_pwd]
    ]);
    $response1 = json_decode($request1->getBody(),true);
    $hid = $response1[0]['hashed_id'];
    $video_id = 'wistia_embed wistia_async_' . $hid . ' popover=true popoverContent=html';

    $element['video_player']  = [
      '#type' => 'inline_template',
      '#theme' => 'dolebas_player',
      '#video_id' => $video_id,
      '#thumb_url' => $thumb_url,
      '#attached' => array(
        'library' => array(
          'dolebas_player/wistia-player-library'
        ),
        'drupalSettings' => array(
          'video_hid' => $hid
        )
      )
    ];

    return $element;
  }
}
