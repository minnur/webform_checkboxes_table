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
    $element = parent::preRenderTable($element);
    // @TODO: Preview is not working. Troubleshoot.
    if (!empty($element['#title'])) {
      $table_title = [
        '#type'                => 'item',
        '#title'               => $element['#title'],
        '#title_display'       => 'before',
        '#attributes'          => ['class' => [$element['#webform_key'], 'checkboxes-table-title']],
        '#description_display' => !empty($element['#description_display']) ? $element['#description_display'] : '',
        '#description'         => !empty($element['#description']) ? $element['#description'] : '',
        '#help'                => !empty($element['#help']) ? $element['#help'] : ''
      ];
      $title_position = (!empty($element['#title_display']) && $element['#title_display'] == 'before') ? 'prefix' : 'suffix';
      $element['#' . $title_position] = \Drupal::service('renderer')->render($table_title);
    }
    $row = 0;
    foreach (self::getCheckboxesElement($element) as $el_id => $el_info) {
      if (!empty($element[$el_id]['#title']) && $el_info['#type'] == 'checkboxes') {
        $new_element = [
          '#type'                => 'item',
          '#title'               => $element[$el_id]['#title'],
          '#title_display'       => 'before',
          '#description_display' => 'before',
          '#description'         => !empty($element[$el_id]['#description']) ? $element[$el_id]['#description'] : '',
          '#help'                => !empty($element[$el_id]['#help']) ? $element[$el_id]['#help'] : ''
        ];
        $title_array = ['data' => \Drupal::service('renderer')->render($new_element), 'class' => $el_id . ' checkboxes-field-title'];
        // Add field title to the beginning of the table data array.
        if ($el_info['#title_display'] == 'before') {
          array_unshift($element['#rows'][$row]['data'], $title_array);
        }
        else {
          $element['#rows'][$row]['data'][] = $title_array;
        }
      }
      $row++;
    }
    return $element;
  }

  /**
   * Get checkboxes elements from a huge array mess (not sure if this is a reliable way).
   */
  protected static function getCheckboxesElement($element) {
    $ids = [];
    foreach ($element as $key => $info) {
      if (!strstr($key, '#')) {
        $ids[$key] = $info;
      }
    }
    return $ids;
  }

}
