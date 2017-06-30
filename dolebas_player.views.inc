<?php

/**
 * Implements hook_views_data_alter().
 */
function dolebas_player_views_data_alter(array &$data) {

  $data['node']['dolebas_player'] = array(
    'title' => t('Dolebas Player'),
    'field' => array(
      'title' => t('Dolebas Player'),
      'help' => t('A videoplayer'),
      'id' => 'dolebas_player',
    ),
  );
}