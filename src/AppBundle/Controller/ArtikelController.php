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
          $nieuwArtikel->actief = "Ja";
          $nieuwArtikel->bestelserie = $nieuwArtikel->minimumVoorraad - $nieuwArtikel->huidigeVoorraad;
          $em->flush();
          return $this->redirect($this->generateurl("artikelbestand"));
      }
      return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
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
          $bestaandArtikel->bestelserie = $bestaandArtikel->minimumVoorraad - $bestaandArtikel->huidigeVoorraad;
          $em->flush();
          return $this->redirect($this->generateurl("artikelbestand"));
      }
      return new Response($this->renderview('formWijzig.html.twig', array('form' => $form->createView())));
  }

 /**
  * @Route("/artikel/verwijder/{artikelnummer}", name="artikelverwijderen")
  */
  public function verwijderArtikel(Request $request, $artikelnummer) {
      $em = $this->getDoctrine()->getManager();
      $bestaandArtikel = $em->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $em->persist($bestaandArtikel);
      $bestaandArtikel->actief = "Nee";
      $em->flush();
      return $this->redirect($this->generateurl("artikelbestand"));
  }

 /**
  * @Route("/artikelbestand", name="artikelbestand")
  */
  public function alleArtikelen(Request $request) {
    $Artikelen = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findBy(array("actief" => "Ja"));
    return new Response($this->renderview('artikel.html.twig', array('artikelen' => $Artikelen)));
  }

 /**
  * @Route("/artikelarchief", name="artikelarchief")
  */
  public function archiefArtikelen(Request $request) {
    $Artikelen = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findBy(array("actief" => "Nee"));
    return new Response($this->renderview('artikel.html.twig', array('artikelen' => $Artikelen)));
  }

 /**
  *@Route("/artikelzoeken", name="artikelzoeken")
  */
  public function artikelzoeken(Request $request){
  $zoekwaarde = $request->request->GET('zoekwaarde');
    
    if($zoekwaarde == null) {
      return new Response("Er is geen zoekwaarde ingevoerd!");
    } 
    //maak de query, gebruik $zoekwaarde als parameter, haal gegevens op en toon ze in een TWIG template (degene die je waarschijnlijk ook gebruikt voor het zoekformulier)
    else {  
      $zoekwaarde = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findByArtikelnummer($zoekwaarde);
      return new Response($this->renderview('artikelzoeken.html.twig', array('zoekwaarde' => $zoekwaarde)));
    }
  }
}
