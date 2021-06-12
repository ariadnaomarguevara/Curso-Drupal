<?php

namespace Drupal\curso_content;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a curso_content entity type.
 */
interface CursoContentInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the curso_content title.
   *
   * @return string
   *   Title of the curso_content.
   */
  public function getTitle();

  /**
   * Sets the curso_content title.
   *
   * @param string $title
   *   The curso_content title.
   *
   * @return \Drupal\curso_content\CursoContentInterface
   *   The called curso_content entity.
   */
  public function setTitle($title);

  /**
   * Gets the curso_content creation timestamp.
   *
   * @return int
   *   Creation timestamp of the curso_content.
   */
  public function getCreatedTime();

  /**
   * Sets the curso_content creation timestamp.
   *
   * @param int $timestamp
   *   The curso_content creation timestamp.
   *
   * @return \Drupal\curso_content\CursoContentInterface
   *   The called curso_content entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the curso_content status.
   *
   * @return bool
   *   TRUE if the curso_content is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the curso_content status.
   *
   * @param bool $status
   *   TRUE to enable this curso_content, FALSE to disable.
   *
   * @return \Drupal\curso_content\CursoContentInterface
   *   The called curso_content entity.
   */
  public function setStatus($status);

}
