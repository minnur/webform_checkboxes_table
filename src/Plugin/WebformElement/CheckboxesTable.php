<?php

namespace Drupal\webform_checkboxes_table\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\Table;

/**
 * Provides a 'checkbxoes table' element.
 *
 * @WebformElement(
 *   id = "webform_checkboxes_table",
 *   api = "https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Render!Element!Table.php/class/Table",
 *   label = @Translation("Checkboxes Table"),
 *   description = @Translation("Provides an element to render checkboxes in a table."),
 *   category = @Translation("Markup elements"),
 * )
 */
class CheckboxesTable extends Table {

}
