<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
use AppBundle\Entity\Ontvangstmelding;
use AppBundle\Form\Type\OntvangstmeldingType;
use AppBundle\Entity\Ontvangstregel;
use AppBundle\Form\Type\OntvangstregelType;
=======
use AppBundle\Entity\OntvangenGoederen;
use AppBundle\Form\Type\OntvangenGoederenType;
>>>>>>> parent of 9d0fc6a... Merge branch 'master' of https://github.com/ThimoAvans/Lunenburg_VMS

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
<<<<<<< HEAD
            return $this->redirect("/Lunenburg_VMS/web/app_dev.php/ontvangstregel/nieuw/$nieuweOntvangstmelding->ontvangstnummer");
=======
            return $this->redirect($this->generateurl("ontvangengoederennieuw"));
>>>>>>> parent of 9d0fc6a... Merge branch 'master' of https://github.com/ThimoAvans/Lunenburg_VMS
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
        return new Response($this->renderview('formWijzig.html.twig', array('form' => $form->createView())));
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
            $ontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->findByOntvangen("Ja");
            return new Response($this->renderview('ontvangengoederen.html.twig', array('goederen' => $ontvangengoederen)));
        }

   /**
    * @Route("/nietontvangengoederen/alle", name="nietOntvangenGoederen")
    */
           public function nietOntvangenGoederen(request $request) {
            $nietontvangengoederen = $this->getDoctrine()->getRepository("AppBundle:OntvangenGoederen")->findByOntvangen("Nee");
            return new Response($this->renderview('nietontvangengoederen.html.twig', array('nietgoederen' => $nietontvangengoederen)));
        }
}