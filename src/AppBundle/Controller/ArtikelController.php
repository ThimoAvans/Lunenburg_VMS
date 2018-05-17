<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;


class ArtikelController extends Controller
{
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

        return new Response($this->render('artikel.html.twig', array('artikelen' => $form->createView())));
    }
}
