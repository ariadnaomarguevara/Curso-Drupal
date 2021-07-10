<?php

namespace Drupal\prueba\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "prueba_example",
 *   admin_label = @Translation("Example"),
 *   category = @Translation("Custom")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'foo' => $this->t('Hello world!'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['foo'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Foo'),
      '#default_value' => $this->configuration['foo'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['foo'] = $form_state->getValue('foo');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $var1 = "Hola";
    $var2 = "Pepito";
    $var3 = "Perez";

    $build = [
      '#theme' => 'templatePrueba',
      '#var1' => $var1,
      '#var2' => $var2,
      '#var3' => $var3,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => [
        'library' => [
          'prueba/prueba',
        ],
        'drupalSettings' => [
          'var' => $var1
        ],
      ],

    ];

    return $build;
  }

}
