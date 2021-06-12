<?php

namespace Drupal\curso_content;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the curso_content entity type.
 */
class CursoContentAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view curso_content');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit curso_content', 'administer curso_content'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete curso_content', 'administer curso_content'], 'OR');

      default:
        // No opinion.
        return AccessResult::neutral();
    }

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, ['create curso_content', 'administer curso_content'], 'OR');
  }

}
