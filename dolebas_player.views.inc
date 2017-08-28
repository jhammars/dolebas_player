<?php

/**
 * @file
 * Contains dolebas_player\dolebas_player.views.inc..
 * Provide a custom views field data that isn't tied to any other module. */

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Render\Markup;
use Drupal\field\FieldConfigInterface;
use Drupal\field\FieldStorageConfigInterface;
use Drupal\system\ActionConfigEntityInterface;


/**
 * Implements hook_views_data_alter().
 */
function dolebas_player_views_data_alter(array &$data) {

    $data['views']['table']['group'] = t('Custom Global');
    $data['views']['table']['join'] = [
      // #global is a special flag which allows a table to appear all the time.
      '#global' => [],
    ];

    $data['views']['dolebas_player_rm_views_field'] = [
        'title' => t('Dolebas Player Remove'),
        'help' => t('Mark user content as removed'),
        'field' => [
            'id' => 'dolebas_player_rm_views_field',
        ],
    ];

    $data['node']['dolebas_player'] = array(
      'title' => t('Dolebas Player'),
      'field' => array(
        // 'title' => t('Dolebas Player'),
        'help' => t('A videoplayer'),
        'id' => 'dolebas_player',
      ),
    );

    return $data;

}