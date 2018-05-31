<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ontvangstmelding;
use AppBundle\Form\Type\OntvangstmeldingType;
use AppBundle\Entity\Ontvangstregel;
use AppBundle\Form\Type\OntvangstregelType;

class GoederenController extends Controller{
    
   /**
    * @Route("/ontvangstmelding/nieuw", name="nieuweOntvangstmelding")
    */
    public function nieuweOntvangstmelding(Request $request) {
        $nieuweOntvangstmelding = new Ontvangstmelding();
        $form = $this->createForm(OntvangstmeldingType::class, $nieuweOntvangstmelding);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweOntvangstmelding);
            $em->flush();
            return $this->redirect("/Lunenburg_VMS/web/app_dev.php/ontvangstregel/nieuw/$nieuweOntvangstmelding->ontvangstnummer");
        }
        return new Response($this->renderview('form.html.twig', array ('form' => $form->createView())));
    }

    /**
     * @Route("/ontvangstmelding/wijzig/{ontvangstnummer}", name="ontvangstmeldingWijzigen")
     */
    public function wijzigOntvangstmelding(Request $request, $ontvangstnummer) {
        $bestaandeOntvangstmelding = $this->getDoctrine()->getRepository("AppBundle:Ontvangstmelding")->find($ontvangstnummer);
        $form = $this->createForm(OntvangstmeldingType::class, $bestaandeOntvangstmelding);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestaandeOntvangstmelding);
            $em->flush();
            return $this->redirect($this->generateurl("alleGoederen"));
        }
        return new Response($this->renderview('formWijzig.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/ontvangstmelding/verwijder/{ontvangstnummer}", name="ontvangstmeldingVerwijderen")
     */
    public function verwijderOntvangstmelding(Request $request, $ontvangstnummer) {
        $bestaandeOntvangstmelding = $this->getDoctrine()->getRepository("AppBundle:Ontvangstmelding")->find($ontvangstnummer);
        $em = $this->getDoctrine()->getManager();
        $bestaandeOntvangstmelding = $em->getRepository("AppBundle:Ontvangstmelding")->find($ontvangstnummer);
        $em->remove($bestaandeOntvangstmelding);
        $em->flush();

        return $this->redirect($this->generateurl("alleGoederen"));
    }

    /**
     * @Route("/ontvangstregel/nieuw/{ontvangstnummer}", name="nieuweOntvangstregel")
     */
    public function nieuweOntvangstregel(Request $request, $ontvangstnummer) {
        $nieuweOntvangstregel = new Ontvangstregel();
        $nieuweOntvangstregel->ontvangstnummer = $ontvangstnummer;
        $form = $this->createForm(OntvangstregelType::class, $nieuweOntvangstregel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweOntvangstregel);
            $em->flush();
            return $this->redirect("/Lunenburg_VMS/web/app_dev.php/ontvangstregel/bekijk/$nieuweOntvangstregel->ontvangstnummer");  
        }
        return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/ontvangstregel/bekijk/{ontvangstnummer}", name="ontvangstregelbekijken")
     */
    public function bekijkOntvangstregel(Request $request, $ontvangstnummer) {
        $ontvangstregels = $this->getDoctrine()->getRepository("AppBundle:Ontvangstregel")->findByOntvangstnummer($ontvangstnummer);
        return new Response($this->renderview('ontvangstregel.html.twig', array('ontvangstregels' => $ontvangstregels)));
    }


   /**
    * @Route("/ontvangengoederen/alle", name="alleGoederen")
    */
        public function alleGoederen(request $request) {
            $ontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:Ontvangstmelding")->findByOntvangen("Ontvangen");
            return new Response($this->renderview('ontvangengoederen.html.twig', array('goederen' => $ontvangengoederen)));
        }

   /**
    * @Route("/nietontvangengoederen/alle", name="nietOntvangenGoederen")
    */
           public function nietOntvangenGoederen(request $request) {
            $nietontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:Ontvangstmelding")->findByOntvangen("Niet Ontvangen");
            return new Response($this->renderview('nietontvangengoederen.html.twig', array('nietgoederen' => $nietontvangengoederen)));
        }
}