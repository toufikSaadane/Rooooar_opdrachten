<?php


namespace Drupal\dino_roar\Routing;


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RoooooarRoutes
{
  /**
   * {@inheritdoc}
   */
  public function routes() {
//    $routeCollection = new RouteCollection();
//    $route_een =  new Route(
//      '/dino/says',
//      [
//        '_controller' => '\Drupal\dino_roar\Controller\RoarController::roar',
//        '_title' => 'dino_roar'
//      ],
//      [
//        '_permission'  => 'access content',
//      ]
//    );
//    $routeCollection->add('dino_roar.dino_says', $route_een);
//    return $routeCollection;

    $routes = [];
    $routes['dino_roar.dino_says'] = new Route(
      '/dino/says',
      [
        '_controller' => '\Drupal\dino_roar\Controller\RoarController::roar',
        '_title' => 'dino_roar'
      ],
      [
        '_permission'  => 'access content',
      ]
    );
    return $routes;
  }
}



