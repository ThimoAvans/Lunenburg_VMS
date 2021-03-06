<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class loginController extends Controller 
{ 

	/**
     * @Route("/loginn", name="loginpaginaa")
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

      $error = $authenticationUtils->getLastAuthenticationError();

      $lastUsername = $authenticationUtils->getLastUsername();


      return $this->render('login.html.twig', array(
         'last_username' => $lastUsername,
         'error' => $error,));

  }

}