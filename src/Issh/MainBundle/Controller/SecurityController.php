<?php

namespace Issh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormError;
use Issh\MainBundle\Entity\IsshUser;
use Issh\MainBundle\Form\Register\RegisterType;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('IsshMainBundle:Security:login.html.php', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
    
    public function registerAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $request = $this->get('request');

        $user = new IsshUser();        
        $form = $this->createForm(new RegisterType(), $user);

        if ('POST' == $request->getMethod()) 
        {        
            $form->bindRequest($request);
            
            $userObj = $this->getDoctrine()->getRepository('IsshMainBundle:IsshUser');
            if ($userObj->findOneByEmail($user->getEmail()))
            {
                $form['email']->addError(new FormError('Email already registered in our system.')); 
            }
            if($userObj->findOneByUserName($user->getUserName()))
            {
                $form['userName']->addError(new FormError('Username already registered in our system.')); 
            }

            $user->setSalt();
            $d = date("Y-m-d H:i:s");
            $user->setCreated($d);
            $user->setRoles(array('ROLE_USER'));

            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPassword(), $user->getSalt()); //where $user->password has been bound in plaintext by the form
            $user->setPassword($password);

            if ($form->isValid()) {
                $em->persist($user);
                $em->flush();
                
                // creates a token and assigns it, effectively logging the user in with the credentials they just registered
//                $token = new UsernamePasswordToken($user, null, 'main');
//                $this->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('home'));
            }

        }
        
        return $this->render('IsshMainBundle:Security:register.html.php', array(
            'form'  =>  $form->createView()));
    }
}
