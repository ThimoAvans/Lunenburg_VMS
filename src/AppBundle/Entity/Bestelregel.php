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
     */
    public $bestelnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="artikelnummer")
     */
    public $artikelnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    public $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20)
     */
    public $status;

    /**
     * @var string
     *
     * @ORM\Column(name="datum_ontvangst", type="string", length=20)
     */
    public $datum_ontvangst;


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

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Bestelregel
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set datum_ontvangst
     *
     * @param integer $datum_ontvangst
     *
     * @return Bestelregel
     */
    public function setDatum_ontvangst($datum_ontvangst)
    {
        $this->datum_ontvangst = $datum_ontvangst;
    
        return $this;
    }

    /**
     * Get datum_ontvangst
     *
     * @return integer
     */
    public function getDatum_ontvangst()
    {
        return $this->datum_ontvangst;
    }
}