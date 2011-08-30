<?php

namespace Issh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('IsshMainBundle:Home:index.html.php');
//        return $this->render('IsshMainBundle:Home:index.html.twig');
    }
}
