<?php

namespace Drupal\curso_formulario\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Curso Formulario routes.
 */
class CursoFormularioController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
