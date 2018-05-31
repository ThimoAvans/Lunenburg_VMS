<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ontvangstmelding;
use AppBundle\Form\Type\OntvangstmeldingType;
use AppBundle\Entity\GoederenOpdracht;
use AppBundle\Form\Type\GoederenOpdrachtType;

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
            return $this->redirect("/Lunenburg_VMS/web/app_dev.php/goederenopdracht/nieuw/$nieuweOntvangstmelding->ontvangstnummer");
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

    /**
     * @Route("/goederenopdracht/nieuw/{ontvangstnummer}", name="nieuwegoederenopdrachten")
     */
    public function nieuweGoederenOpdracht(Request $request, $ontvangstnummer) {
        $nieuweGoederenOpdracht = new GoederenOpdracht();
        $nieuweGoederenOpdracht->ontvangstnummer = $ontvangstnummer;
        $form = $this->createForm(GoederenOpdrachtType::class, $nieuweGoederenOpdracht);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweGoederenOpdracht);
            $em->flush();
            return $this->redirect("/Lunenburg_VMS/web/app_dev.php/goederenopdracht/bekijk/$nieuweGoederenOpdracht->ontvangstnummer");  
        }
        return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/goederenopdracht/bekijk/{ontvangstnummer}", name="goederenopdrachtbekijken")
     */
    public function bekijkGoederenOpdracht(Request $request, $ontvangstnummer) {
        $goederenopdracht = $this->getDoctrine()->getRepository("AppBundle:GoederenOpdracht")->findByOntvangstnummer($ontvangstnummer);
        return new Response($this->renderview('goederenopdracht.html.twig', array('goederenopdracht' => $goederenopdracht)));
    }
}
test