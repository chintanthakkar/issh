<?php

namespace Issh\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('IsshFrontendBundle:Home:index.html.php');
//        return $this->render('IsshFrontendBundle:Home:index.html.twig');
    }
}
