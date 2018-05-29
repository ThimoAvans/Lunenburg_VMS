<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelling;
use AppBundle\Form\Type\BestellingType;
use AppBundle\Entity\Bestelregel;
use AppBundle\Form\Type\BestelregelType;

class BestelController extends Controller
{	
	/**
     * @Route("/bestelling/nieuw", name="nieuwebestelling")
     */
	public function nieuweBestelling(Request $request) {
		$nieuweBestelling = new Bestelling();
		$form = $this->createForm(BestellingType::class, $nieuweBestelling);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweBestelling);
			$em->flush();
			return $this->redirect($this->generateurl("/bestelregel/nieuw/$nieuweBestelling->bestelnummer"));
		}

		return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
	}

	/**
     * @Route("/bestelregel/nieuw/{a}", name="nieuwebestelregel")
     */
	public function nieuweBestelregel(Request $request, $a) {
		$nieuweBestelregel = new Bestelregel();
		$nieuweBestelregel->bestelnummer = $a;
		$form = $this->createForm(BestelregelType::class, $nieuweBestelregel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweBestelregel);
			$em->flush();
			return $this->redirect($this->generateurl("/bestelling/bekijk/$nieuweBestelregel->bestelnummer"));
		}

		return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
	}

	/**
     * @Route("/bestelling/wijzig/{bestelnummer}", name="bestellingwijzigen")
     */
	public function wijzigBestelling(Request $request, $bestelnummer) {
		$bestaandeBestelling = $this->getDoctrine()->getRepository("AppBundle:Bestelling")->find($bestelnummer);
		$form = $this->createForm(BestellingType::class, $bestaandeBestelling);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandeBestelling);
			$em->flush();
			return $this->redirect($this->generateurl("allebestellingen"));
		}

		return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
	}

	/**
     * @Route("/bestelling/verwijder/{bestelnummer}", name="bestellingverwijderen")
     */
	public function verwijderBestelling(Request $request, $bestelnummer) {
		$em = $this->getDoctrine()->getManager();
		$bestaandeBestelling = $em->getRepository("AppBundle:Bestelling")->find($bestelnummer);
		$em->remove($bestaandeBestelling);
		$em->flush();
		return $this->redirect($this->generateurl("allebestellingen"));
	}

	/**
     * @Route("/bestelling/bekijk/{bestelnummer}", name="bestellingbekijken")
     */
	public function bekijkBestelregels(Request $request, $bestelnummer) {
		$Bestelregels = $this->getDoctrine()->getRepository("AppBundle:Bestelregel")->findByBestelnummer($bestelnummer);
		return new Response($this->renderview('bestelregel.html.twig', array('bestelregels' => $Bestelregels)));
	}

	/**
     * @Route("/allebestellingen", name="allebestellingen")
     */
	public function alleBestellingen(Request $request) {
		$Bestellingen = $this->getDoctrine()->getRepository("AppBundle:Bestelling")->findAll();
		return new Response($this->renderview('bestelling.html.twig', array('bestellingen' => $Bestellingen)));
	}
}
?>