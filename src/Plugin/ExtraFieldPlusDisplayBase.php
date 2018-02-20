<?php

namespace Drupal\extra_field_plus\Plugin;

use Drupal\extra_field\Plugin\ExtraFieldDisplayBase;

/**
 * Base class for Extra field Plus Display plugins.
 */
abstract class ExtraFieldPlusDisplayBase extends ExtraFieldDisplayBase implements ExtraFieldPlusDisplayInterface {

  /**
   * {@inheritdoc}
   */
  public function getSettings() {
    $field_id = 'extra_field_' . $this->getPluginId();
    $display = $this->getEntityViewDisplay();
    $component = $display->getComponent($field_id);

    if (!empty($component['settings'])) {
      $settings = $component['settings'];
    }
    else {
      $settings = (array) $this->getDefaultFormValues();
    }

    return $settings;
  }

  /**
   * Provides field settings form.
   *
   * @return array
   *   The field settings form.
   */
  protected function settingsForm() {
    $elements = [];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function getSettingsForm() {
    $default_values = (array) $this->getDefaultFormValues();
    $elements = (array) $this->settingsForm();

    if (!empty($elements)) {
      foreach ($elements as $name => &$element) {
        $element['#default_value'] = isset($default_values[$name]) ? $default_values[$name] : '';
      }
    }

    return $elements;
  }

  /**
   * Provides field settings form default values.
   *
   * @return array
   *   The form values.
   */
  protected function defaultFormValues() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getDefaultFormValues() {
    return $this->defaultFormValues();
  }

}
