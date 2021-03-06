<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;
use AppBundle\Form\Type\ArtikelType2;
use AppBundle\Form\Type\ArtikelType3;
use AppBundle\Form\Type\ReserveerType;


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
   * @Route("/artikel/wijzig2/{artikelnummer}", name="artikelwijzigen2")
   */
  public function wijzigArtikel2(Request $request, $artikelnummer) {
      $bestaandArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $form = $this->createForm(ArtikelType2::class, $bestaandArtikel);

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
   * @Route("/artikel/wijzig3/{artikelnummer}", name="artikelwijzigen3")
   */
  public function wijzigArtikel3(Request $request, $artikelnummer) {
      $bestaandArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $form = $this->createForm(ArtikelType3::class, $bestaandArtikel);

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
   * @Route("/artikel/reserveer/{artikelnummer}", name="artikelreserveren")
   */
  public function reserveerArtikel(Request $request, $artikelnummer) {
      $bestaandArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $form = $this->createForm(ReserveerType::class, $bestaandArtikel);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($bestaandArtikel);
          $bestaandArtikel->_gereserveerdeVoorraad = $bestaandArtikel->_gereserveerdeVoorraad + $bestaandArtikel->gereserveerdeVoorraad;
          $bestaandArtikel->gereserveerdeVoorraad = null;
          $em->flush();
          return $this->redirect($this->generateurl("artikelbestand"));
      }
      return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
  }

 /**
  * @Route("/artikel/archiveren/{artikelnummer}", name="artikelarchiveren")
  */
  public function archiveerArtikel(Request $request, $artikelnummer) {
      $em = $this->getDoctrine()->getManager();
      $bestaandArtikel = $em->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $em->persist($bestaandArtikel);
      $bestaandArtikel->actief = "Nee";
      $em->flush();
      return $this->redirect($this->generateurl("artikelbestand"));
  }

 /**
  * @Route("/artikel/de-archiveren/{artikelnummer}", name="artikelDe-archiveren")
  */
  public function dearchiveerArtikel(Request $request, $artikelnummer) {
      $em = $this->getDoctrine()->getManager();
      $bestaandArtikel = $em->getRepository("AppBundle:Artikel")->find($artikelnummer);
      $em->persist($bestaandArtikel);
      $bestaandArtikel->actief = "Ja";
      $em->flush();
      return $this->redirect($this->generateurl("artikelarchief"));
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
    return new Response($this->renderview('artikelgearchiveerd.html.twig', array('artikelen' => $Artikelen)));
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

   /**
    * @Route("/artikel/minimumvoorraad", name="artikelMinimumvoorraad")
    */
    public function alleMinimumvoorraad(request $request) {
        $minimumvoorraad = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
        return new Response($this->renderview('bijbestellen.html.twig', array('minimumvoorraad' => $minimumvoorraad)));
    }

}
