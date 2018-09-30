<?php

namespace Zenva\WorkoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
   
class DefaultController extends Controller
{
    /**
     * @Route("/create")
    */
    public function indexAction()
    {    
        
    $workout=new \Zenva\WorkoutBundle\Entity\Workout();
    
    $workout->setActivity("Watching Movie");
    $workout->setOccurrenceDate(new \DateTime());
    $workout->setHours(3);
    $res=$this->getDoctrine()->getManager();
    
    $res->persist($workout);
    
    $res->flush();
    
    return new Response('Saved bew Activity with ID: '.$workout->getId());
}
}
?>