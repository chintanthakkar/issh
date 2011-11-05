<?php

namespace Issh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Issh\MainBundle\Form\Post\CommentForm;
use Issh\MainBundle\Form\Post\PostForm;
use Issh\MainBundle\Form\Post\SlaptasticForm;
use Issh\MainBundle\Form\Post\StingerForm;
use Issh\MainBundle\Entity\IsshPost;
use Issh\MainBundle\Entity\IsshComment;
use Issh\MainBundle\Entity\IsshSlaptastic;
use Issh\MainBundle\Entity\IsshStinger;

class HomeController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('IsshMainBundle:Home:index.html.php');
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

            if ($form->isValid()) 
            {
                $em->persist($post);
                $em->flush();

                return $this->redirect($this->generateUrl('home'));
            }
            return $this->render('IsshMainBundle:Home:IsshPost.html.php', array(
                 'form'  =>  $form->createView()));   
        }
        else
        {
            $em = $this->getDoctrine()->getEntityManager();
            $posts = $em->getRepository('IsshMainBundle:IsshPost')->getLatestPosts();
            return $this->render('IsshMainBundle:Home:IsshPost.html.php', array(
                'form'  =>  $form->createView(), 'posts' => $posts));           
        }
     
    }
    
    public function commentAction($postID = null)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');

        $comment = new IsshComment(); 

        if($postID == null)
        {
            $data = $request->get('commentForm');
            $postID = $data['IsshPost'];
        }
        
        $IsshPost = $this->getDoctrine()->getRepository('IsshMainBundle:IsshPost')->find($postID);
        $form = $this->createForm(new CommentForm($IsshPost), $comment); 
        
        if ('POST' == $request->getMethod()) 
        {   
            $comment->setIsshPost($IsshPost);
            $form->bindRequest($request);           
            $comment->setIsshUser($this->get('security.context')->getToken()->getUser());  
            if ($form->isValid()) {
                $em->persist($comment);
                $em->flush();

                return $this->redirect($this->generateUrl('home'));
            }
            
            // this might need to change in case of validation errors! - CT
            return $this->render('IsshMainBundle:Home:IsshComment.html.php', array(
                 'form'  =>  $form->createView()));   
        }
        else
        {
            $em = $this->getDoctrine()->getEntityManager();
            $comments = $em->getRepository('IsshMainBundle:IsshComment')->getLatestComments(5,$postID);
            return $this->render('IsshMainBundle:Home:IsshComment.html.php', array(
                'form'  =>  $form->createView(), 'comments' => $comments));           
        }     
    }
    
    
    public function slaptasticAction($postID = null)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');

        $slaptastic = new IsshSlaptastic(); 

        if($postID == null)
        {
            $data = $request->get('SlaptasticForm');
            $postID = $data['IsshPost'];
//            var_dump($postID);die();
        }
        
        $IsshPost = $this->getDoctrine()->getRepository('IsshMainBundle:IsshPost')->find($postID);
        $form = $this->createForm(new SlaptasticForm($IsshPost), $slaptastic); 
        
        if ('POST' == $request->getMethod()) 
        {   
            $slaptastic->setIsshPost($IsshPost);
            $form->bindRequest($request);           
            $slaptastic->setIsshUser($this->get('security.context')->getToken()->getUser());  
            if ($form->isValid()) {
                $em->persist($slaptastic);
                $em->flush();

                return $this->redirect($this->generateUrl('home'));
            }
            
            return $this->render('IsshMainBundle:Home:IsshSlaptastic.html.php', array(
                 'form'  =>  $form->createView()));   
        }
        else
        {
            $em = $this->getDoctrine()->getEntityManager();
            $numSlaptastics = $em->getRepository('IsshMainBundle:IsshSlaptastic')->getNumSlaptastics($postID);
            return $this->render('IsshMainBundle:Home:IsshSlaptastic.html.php', array(
                'form'  =>  $form->createView(), 'numSlaptastics' => $numSlaptastics));           
        }     
    }
    
    public function stingerAction($postID = null)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');

        $stinger = new IsshStinger(); 

        if($postID == null)
        {
            $data = $request->get('StingerForm');
            $postID = $data['IsshPost'];
        }
        
        $IsshPost = $this->getDoctrine()->getRepository('IsshMainBundle:IsshPost')->find($postID);
        $form = $this->createForm(new StingerForm($IsshPost), $stinger); 
        
        if ('POST' == $request->getMethod()) 
        {   
            $stinger->setIsshPost($IsshPost);
            $form->bindRequest($request);           
            $stinger->setIsshUser($this->get('security.context')->getToken()->getUser());  
            if ($form->isValid()) {
                $em->persist($stinger);
                $em->flush();

                return $this->redirect($this->generateUrl('home'));
            }
            
            return $this->render('IsshMainBundle:Home:IsshStinger.html.php', array(
                 'form'  =>  $form->createView()));   
        }
        else
        {
            $em = $this->getDoctrine()->getEntityManager();
            $numStingers = $em->getRepository('IsshMainBundle:IsshStinger')->getNumStingers($postID);
            return $this->render('IsshMainBundle:Home:IsshStinger.html.php', array(
                'form'  =>  $form->createView(), 'numStingers' => $numStingers));           
        }     
    }    
    
}
