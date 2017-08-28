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
 * @ViewsField("dolebas_player_rm_views_field")
 */
class DolebasPlayerRmViewsField extends FieldPluginBase {

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

    $uuid = strip_tags($this->view->field['uuid']->original_value);
    
    $element['remove_button']  = [
      '#theme' => 'dolebas_player_remove_button',
      '#attached' => array(
        'library' => array(
          'dolebas_player/remove-button'
        ),
        'drupalSettings' => array(
          'remove_uuid' => $uuid
        )
      )
    ];

    return $element;

  }
}
