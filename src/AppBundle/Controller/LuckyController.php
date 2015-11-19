<?php
// http://localhost:8888/webDev/symfony/isHosting/web/app_dev.php/lucky/number
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
      $number = rand(0, 100);

      return new Response(
        '<html><body>Lucky number: '.$number.'</body></html>'
    );
    }
}
