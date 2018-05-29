<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * GoederenOpdracht
 *
 * @ORM\Table(name="goederen_opdracht")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GoederenOpdrachtRepository")
 */
class GoederenOpdracht
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer", unique=true)
     */
    private $artikelnummer;



    /**
     * @var int
     *
     * @ORM\Column(name="ontvangstnummer", type="integer", unique=true)

      * @ORM\ManyToOne(targetEntity="OntvangenGoederen", inversedBy="ontvangstnummer")
     * @ORM\JoinColumn(name="ontvangengoederen_ontvangstnummer", referencedColumnName="ontvangstnummer")

     */


    private $ontvangstnummer;

        /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    private $hoeveelheid;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return GoederenOpdracht
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;
    
        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return integer
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set ontvangstnummer
     *
     * @param integer $ontvangstnummer
     *
     * @return GoederenOpdracht
     */
    public function setOntvangstnummer($ontvangstnummer)
    {
        $this->ontvangstnummer = $ontvangstnummer;
    
        return $this;
    }

    /**
     * Get ontvangstnummer
     *
     * @return integer
     */
    public function getOntvangstnummer()
    {
        return $this->ontvangstnummer;
    }

       /**
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Bestelregel
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;
    
        return $this;
    }

    /**
     * Get hoeveelheid
     *
     * @return integer
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

            public function __toString() {
        return (string) $this->ontvangstnummer;
    }
}

