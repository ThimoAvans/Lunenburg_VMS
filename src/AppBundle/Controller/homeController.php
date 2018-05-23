<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class homeController extends Controller 
{ 

	/**
     * @Route("/home", name="homepagina")
     */
    public function indexAction()
    {
        // 1. Using the shortcut method of the controller

        // Adding a success type message
        $this->addFlash("success", "This is a success message");

        // Adding a warning type message
        $this->addFlash("warning", "This is a warning message");

        // Adding an error type message
        $this->addFlash("error", "This is an error message");

        // Adding a custom type message, remember the type is totally up to you !
        $this->addFlash("bat-alarm", "Gotham needs Batman");

        // 2. Retrieve manually the flashbag

        // Retrieve flashbag from the controller
        $flashbag = $this->get('session')->getFlashBag();

        // Set a flash message
        $flashbag->add("other", "This is another flash message with other type");

        // Render some twig view
       return $this->render('default/homepagina.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
	

}