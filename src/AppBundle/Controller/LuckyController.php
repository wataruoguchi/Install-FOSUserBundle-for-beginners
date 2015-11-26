<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{count}")
     */
    // http://localhost:8888/webDev/symfony/isHosting/web/app_dev.php/lucky/number
    public function numberAction($subdomain, $count)
    {
      $numbers = array();
      for($i = 0; $i < $count; $i++) {
        $numbers[] = rand(0, 100);
      }
      $numbersList = implode(', ', $numbers);

      return $this->render(
        'lucky/number.html.twig',
        array('luckyNumberList' => $numbersList, 'subdomain' => $subdomain)
      );
    }

    /**
     * @Route("/api/lucky/number")
     */
    // http://localhost:8888/webDev/symfony/isHosting/web/app_dev.php/api/lucky/number
    public function apiNumberAction()
    {
      $data = array(
        'lucky_number' => rand(0, 100),
      );

      // calls json_encode and sets the Content-Type header
      return new JsonResponse($data);
    }
}
