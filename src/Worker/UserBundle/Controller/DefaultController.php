<?php

namespace Worker\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Worker\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$user = $this->get('security.context')->getToken()->getUser();
    	if(!$user) {

    		return $this->redirect($this->generateUrl('worker_front_user_login'));
    	}

    	return $this->render('WorkerUserBundle:Default:index.html.twig');
    }

    
    public function profileAction(Request $request) {
        
        $user = $this->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();
        
        $profileObj = $em->getRepository('WorkerUserBundle:User')->findOneBy(array('id' => $user->getId()));
        
        $form = $this->createForm(new ProfileFormType(), $profileObj);


        if ($request->getMethod() == "POST") {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($profileObj);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', "Profile updated successfully.");

            }
        }

        return $this->render('WorkerUserBundle:Default:profile.html.twig', array('form' => $form->createView())); 

    }


}
