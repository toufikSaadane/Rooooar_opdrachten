<?php


namespace Drupal\dino_roar\Access;


use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

class DinoAccessCheck implements AccessInterface
{
  /**
   * @return string
   */
  public function appliesTo()
  {
    return '_dino_access_check';
  }

  /**
   * @param Route $route
   * @param Request $request
   * @param AccountInterface $account
   * @return AccessResult|\Drupal\Core\Access\AccessResultAllowed
   */
  public function access(Route $route, Request $request, AccountInterface $account)
  {
    if ($account->isAuthenticated()) {
      return AccessResult::allowed();
    } else {
      return AccessResult::forbidden();
    }
  }

}
