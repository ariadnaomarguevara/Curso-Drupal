<?php

namespace Drupal\curso_config\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\curso_config\CursoConfigInterface;

/**
 * Defines the curso_config entity type.
 *
 * @ConfigEntityType(
 *   id = "curso_config",
 *   label = @Translation("curso_config"),
 *   label_collection = @Translation("curso_configs"),
 *   label_singular = @Translation("curso_config"),
 *   label_plural = @Translation("curso_configs"),
 *   label_count = @PluralTranslation(
 *     singular = "@count curso_config",
 *     plural = "@count curso_configs",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\curso_config\CursoConfigListBuilder",
 *     "form" = {
 *       "add" = "Drupal\curso_config\Form\CursoConfigForm",
 *       "edit" = "Drupal\curso_config\Form\CursoConfigForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "curso_config",
 *   admin_permission = "administer curso_config",
 *   links = {
 *     "collection" = "/admin/structure/curso-config",
 *     "add-form" = "/admin/structure/curso-config/add",
 *     "edit-form" = "/admin/structure/curso-config/{curso_config}",
 *     "delete-form" = "/admin/structure/curso-config/{curso_config}/delete"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description"
 *   }
 * )
 */
class CursoConfig extends ConfigEntityBase implements CursoConfigInterface {

  /**
   * The curso_config ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The curso_config label.
   *
   * @var string
   */
  protected $label;

  /**
   * The curso_config status.
   *
   * @var bool
   */
  protected $status;

  /**
   * The curso_config description.
   *
   * @var string
   */
  protected $description;

}
