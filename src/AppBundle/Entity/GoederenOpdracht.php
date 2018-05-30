<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * GoederenOpdracht
 *
 * @ORM\Table(name="goederenopdracht")
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
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=255)
     */
    private $omschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="ontvangstnummer", type="integer", unique=true)
     *
     * @ORM\ManyToOne(targetEntity="Ontvangstmelding", inversedBy="ontvangstnummer")
     * @ORM\JoinColumn(name="ontvangstmelding_ontvangstnummer", referencedColumnName="ontvangstnummer")
     */
    public $ontvangstnummer;

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

        /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return GoederenOpdracht
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }
}

