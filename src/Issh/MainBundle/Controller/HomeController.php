<?php

namespace Issh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Issh\MainBundle\Form\Post\CommentForm;
use Issh\MainBundle\Form\Post\PostForm;
use Issh\MainBundle\Entity\IsshPost;
use Issh\MainBundle\Entity\IsshComment;

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
    
}
