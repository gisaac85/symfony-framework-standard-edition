<?php

namespace Zenva\WorkoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/workout")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/",name="workout-index")
     * @Template()
    */
    public function indexAction()
    {
    $workouts=[
       ['date'=>new \DateTime(),'activity'=>'walking','hours'=>1],
       ['date'=>new \DateTime(),'activity'=>'swiming','hours'=>1.5],
       ['date'=>new \DateTime(),'activity'=>'Gym','hours'=>2],
       ['date'=>new \DateTime(),'activity'=>'Tv Watching','hours'=>3],    
        
    ];
    return ['workouts'=>$workouts,'name'=>'Your Name','age'=>99];
    }
}
