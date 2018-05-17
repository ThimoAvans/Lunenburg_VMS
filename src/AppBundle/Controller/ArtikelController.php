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
     * @Route("/artikel/nieuw", name="artikeltoevoegen")
     */
    public function nieuwArtikel(Request $request) {
        $nieuwArtikel = new Artikel();
        $form = $this->createForm(ArtikelType::class, $nieuwArtikel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuwArtikel);
            $nieuwArtikel->bestelserie = $nieuwArtikel->minimumVoorraad - $nieuwArtikel->huidigeVoorraad;
            $em->flush();
            return $this->redirect($this->generateurl("artikelbestand"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/artikel/wijzig/{artikelnummer}", name="artikelwijzigen")
     */
    public function wijzigArtikel(Request $request, $artikelnummer) {
        $bestaandArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnummer);
        $form = $this->createForm(ArtikelType::class, $bestaandArtikel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestaandArtikel);
            $em->flush();
            return $this->redirect($this->generateurl("artikelbestand"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/artikel/verwijder/{artikelnummer}", name="artikelverwijderen")
     */
    public function verwijderArtikel(Request $request, $artikelnummer) {
        $em = $this->getDoctrine()->getManager();
        $bestaandArtikel = $em->getRepository("AppBundle:Artikel")->find($artikelnummer);
        $em->remove($bestaandArtikel);
        $em->flush();
        return $this->redirect($this->generateurl("artikelbestand"));
    }

    /**
     * @Route("/artikelbestand", name="artikelbestand")
     */
    public function alleArtikelen(Request $request) {
      $Artikelen = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
      return new Response($this->render('artikel.html.twig', array('artikelen' => $Artikelen)));
    }
}
