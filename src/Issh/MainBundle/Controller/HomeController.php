<?php

namespace Issh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Issh\MainBundle\Form\Post\PostForm;
use Issh\MainBundle\Entity\IsshPost;

class HomeController extends Controller
{
    
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository('IsshMainBundle:IsshPost')->getLatestPosts();
        
        return $this->render('IsshMainBundle:Home:index.html.php',
                array(
                    'posts' => $posts
                ));
    }
    
    public function postAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');

        $post = new IsshPost();        
        $form = $this->createForm(new PostForm(), $post);

        if ('POST' == $request->getMethod()) 
        {        
            $form->bindRequest($request);           
            $post->setIsshUser($this->get('security.context')->getToken()->getUser());

            if ($form->isValid()) {
                $em->persist($post);
                $em->flush();

                return $this->redirect($this->generateUrl('home'));
            }

        }
        
        return $this->render('IsshMainBundle:Home:IsshPost.html.php', array(
            'form'  =>  $form->createView()));        
    }
}
