<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelregel
 *
 * @ORM\Table(name="bestelregel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelregelRepository")
 */
class Bestelregel
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
     * @ORM\Column(name="bestelnummer", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Bestelling", inversedBy="bestelnummer")
     * @ORM\JoinColumn(name="bestelling_bestelnummer", referencedColumnName="bestelnummer")
     */
    private $bestelnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer")
     */
    private $artikelnummer;

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
     * Set bestelnummer
     *
     * @param integer $bestelnummer
     *
     * @return Bestelregel
     */
    public function setBestelnummer($bestelnummer)
    {
        $this->bestelnummer = $bestelnummer;
    
        return $this;
    }

    /**
     * Get bestelnummer
     *
     * @return integer
     */
    public function getBestelnummer()
    {
        return $this->bestelnummer;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Bestelregel
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
        return (string) $this->bestelnummer;
    }

}

