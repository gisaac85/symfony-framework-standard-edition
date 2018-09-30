<?php

namespace Zenva\WorkoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Route("/hello/")
    */
    public function indexAction($name='Gaorieh')
    {
      $res=new Response(json_encode(array('name'=>$name)));
      $res->headers->set('Content-Type','application/json');
      return $res;
    }
}
