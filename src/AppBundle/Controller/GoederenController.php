<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\OntvangenGoederen;
use AppBundle\Form\Type\OntvangenGoederenType;

class GoederenController extends Controller{
    /**
    * @Route("/ontvangengoederen/nieuw", name="ontvangengoederennieuw")
    */
    public function nieuweOntvangenGoederen(Request $request) {
        $nieuweOntvangenGoederen = new OntvangenGoederen();
        $form = $this->createForm(OntvangenGoederenType::class, $nieuweOntvangenGoederen);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweOntvangenGoederen);
            $em->flush();
            return $this->redirect($this->generateurl("ontvangengoederennieuw"));
        }
        return new Response($this->renderview('form.html.twig', array ('form' => $form->createView())));
    }

    /**
     * @Route("/ontvangengoederen/wijzig/{ontvangstnummer}", name="goederenwijzigen")
     */
    public function wijzigOntvangenGoederen(Request $request, $ontvangstnummer) {
        $bestaandeGoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->find($ontvangstnummer);
        $form = $this->createForm(OntvangenGoederenType::class, $bestaandeGoederen);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestaandeGoederen);
            $em->flush();
            return $this->redirect($this->generateurl("alleGoederen"));
        }
        return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
    }

    /**
     * @Route("/ontvangengoederen/verwijder/{ontvangstnummer}", name="goederenverwijdering")
     */
    public function verwijderOntvangenGoederen(Request $request, $ontvangstnummer) {
        $bestaandeGoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->find($ontvangstnummer);
        $em = $this->getDoctrine()->getManager();
        $bestaandeGoederen = $em->getRepository("AppBundle:OntvangenGoederen")->find($ontvangstnummer);
        $em->remove($bestaandeGoederen);
        $em->flush();

        return $this->redirect($this->generateurl("alleGoederen"));
    }




    /**
     * @Route("/ontvangengoederen/alle", name="alleGoederen")
     */
    public function alleGoederen(request $request) {
        $ontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->findByOntvangen("Groen");
        return new Response($this->renderview('ontvangengoederen.html.twig', array('goederen' => $ontvangengoederen)));
    }

    /**
     * @Route("/nietontvangengoederen/alle", name="nietOntvangenGoederen")
     */
    public function nietOntvangenGoederen(request $request) {
        $nietontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->findByOntvangen("Rood");
        return new Response($this->renderview('nietontvangengoederen.html.twig', array('nietgoederen' => $nietontvangengoederen)));
    }

}