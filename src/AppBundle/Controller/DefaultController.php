<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
        //$this->getDoctrine()->getRepository('AppBundle:Klant')->findAll();
    }

    /**
    * @Route("/artikel/bestand", name="artikelbestand")
    */
    public function nieuwArtikelBestand(Request $request) {
        $nieuwArtikelBestand = new Artikel();
        $form = $this->createForm(ArtikelType::class, $nieuwArtikelBestand);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuwArtikelBestand);
            $em->flush();
            return $this->redirect($this->generateurl("artikelbestand"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }

}
