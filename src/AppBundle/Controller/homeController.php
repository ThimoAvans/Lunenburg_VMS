<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;


class homeController extends Controller 
{ 

	/**
     * @Route("/home", name="homepagina")
     */
    public function indexAction()
    {

     return $this->render('default/home.html.twig', [
        'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,]);
 	}

   /**
    * @Route("/getusers", name="getusers")
    */
    public function getUsers(request $request) {
        $Users = $this->getDoctrine()->getRepository("AppBundle:User")->findAll();
        return new Response($this->render('base.html.twig', array('users' => $Users)));
    }
}