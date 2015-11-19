<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    // http://localhost:8888/webDev/symfony/isHosting/web/app_dev.php/lucky/number
    public function numberAction()
    {
      $number = rand(0, 100);

      return new Response(
        '<html><body>Lucky number: '.$number.'</body></html>'
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
