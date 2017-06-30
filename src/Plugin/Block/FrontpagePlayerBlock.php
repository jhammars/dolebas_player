<?php

namespace Drupal\dolebas_player\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Frontpage Player block' Block.
 *
 * @Block(
 *   id = "frontpage_player_block",
 *   admin_label = @Translation("Dolebas Frontpage Player Block"),
 * )
 */
class FrontpagePlayerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $hid = 'pu8lyf4e4m';
    $frontpage_video_id = 'wistia_embed wistia_async_' . $hid . '';

    return [
      '#theme' => 'frontpage_player',
      '#frontpage_video_id' => $frontpage_video_id,
      '#attached' => array(
        'library' =>  array(
          'dolebas_player/frontpage-player-library',
        ),
        'drupalSettings' => array(
          'frontpage_hid' => $hid
        ),
      ),
    ];

  }

}