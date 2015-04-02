<?php

namespace AL\RealEstateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ALRealEstateBundle:Default:index.html.twig', array('name' => $name));
    }
}
