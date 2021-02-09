<?php


namespace Drupal\dino_roar\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class RoarController extends ControllerBase
{

  /**
   * @var RoarGenerator
   */
  private $roarGenerator;

  /**
   * RoarController constructor.
   * @param RoarGenerator $roarGenerator
   */
  public function __construct(RoarGenerator $roarGenerator)
  {
    $this->roarGenerator = $roarGenerator;
  }

  /**
   * @return Response
   */
  public function roar(): Response
  {
    $roar = "ROAAAAAAR";
    return new Response($roar);
  }

  /**
   * @param $count
   * @return Response
   */
  public function generatedRoar($count): Response
  {
    $roar = $this->roarGenerator->generateWithDeKnpManier($count);
    return new Response($roar);
  }


  /**
   * @param $count
   * @param $someone
   * @return Response
   */
  public function generateOtherRoar($count, $someone)
  {
    $roar = "<h4>$someone</h4>" . " " . $this->roarGenerator->roooooarToSomeOneWithCount($count) . "ING";
    return new Response($roar);
  }

  /**
   * @param string $name
   * @return string[]
   */
  public function paramConverter(string $name){
    return [
      '#type' => 'markup',
      '#markup' => 'dino param converter yes yes '. $name
    ];
  }

  /**
   * @return string[]
   */
  public function checkDino()
  {
    return [
      '#type' => 'markup',
      '#markup' => 'dino Checked'
    ];
  }

  public static function create(ContainerInterface $container)
  {
    /** @var RoarGenerator $container */
    return new static(
      $container->get('dino_roar.dino_says.roar_generator')
    );
  }

}
