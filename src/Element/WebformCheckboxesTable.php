<?php

namespace Drupal\webform_checkboxes_table\Element;

use Drupal\Core\Render\Element\Table;

/**
 * Provides a render element for a checkboxes table.
 *
 * @RenderElement("webform_checkboxes_table")
 */
class WebformCheckboxesTable extends Table {

  /**
   * {@inheritdoc}
   */
  public static function preRenderTable($element) {
    $help = '';
    if (!empty($element['#help'])) {
      $help_text = Html::escape(strip_tags($element['#help']));
      $help = ' <label class="option"><a href="#help" title="' . $help_text . '" data-webform-help="' . $help_text . '" class="webform-element-help">?</a></label>';
    }
    $description = '';
    if (!empty($element['#description'])) {
      $description = ' <div class="table-description">' . \Drupal::service('renderer')->renderPlain($element['#description']) .'</div>';
    }
    if (!empty($element['#title_display'])) {
      if ($element['#title_display'] == 'before') {
        $element['#prefix'] = '<div class="table-title">' . Html::escape($element['#title']) . $help . '</div>' . $description;
      }
      elseif ($element['#title_display'] == 'after') {
        $element['#suffix'] = '<div class="table-title">' . Html::escape($element['#title']) . $help .'</div>' . $description;
      }
    }
    $element = parent::preRenderTable($element, $form_state, $complete_form);
    $row = 0;
    foreach (self::getCheckboxesElement($element) as $el_id) {
      $title_array = ['data' => $element[$el_id]['#title'], 'class' => 'checkboxes-field-title'];
      // Add field title to the beginning of the table data array.
      array_unshift($element['#rows'][$row]['data'], $title_array);
      $row++;
    }
    return $element;
  }

  /**
   * Get checkboxes elements from a huge array mess (not sure if this is a reliable way).
   */
  protected static function getCheckboxesElement($element) {
    $ids = [];
    foreach ($element as $key => $value) {
      if (!strstr($key, '#')) {
        $ids[] = $key;
      }
    }
    return $ids;
  }

}
