<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;   

/**
 * Ontvangenoederen
 *
 * @ORM\Table(name="ontvangstmelding")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OntvangenGoederenRepository")
 */
class OntvangenGoederen
{

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datumontvangst", type="date")
     */
    private $datumontvangst;

    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    private $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=255)
     */
    private $kwaliteit;

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
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=100)
     */
    private $leverancier;

    /**
    * @var string
    *
    * @ORM\Column(name="ontvangen", type="string", length=100)
    */

    private $ontvangen;

    /**
    * @var int
    *
     * @ORM\Column(name="ontvangstnummer", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $ontvangstnummer;

    /**
     * @ORM\ManyToMany(targetEntity="Artikel", inversedBy="goederenopdracht", cascade={"persist"})
     */
    private $ontvangenartikelen;

    public function __construct(){
        $this->ontvangengoederen = new ArrayCollection();
    }

    /**
     * Set datumontvangst
     *
     * @param \DateTime $datumontvangst
     *
     * @return Ontvangengoederen
     */
    public function setDatumontvangst($datumontvangst)
    {
        $this->datumontvangst = $datumontvangst;

        return $this;
    }

    /**
     * Get datumontvangst
     *
     * @return \DateTime
     */
    public function getDatumontvangst()
    {
        return $this->datumontvangst;
    }

    /**
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Ontvangengoederen
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;

        return $this;
    }

    /**
     * Get hoeveelheid
     *
     * @return int
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return Ontvangengoederen
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Ontvangengoederen
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Ontvangengoederen
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

    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Ontvangengoederen
     */
    public function setLeverancier($leverancier)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return string
     */
    public function getLeverancier()
    {
        return $this->leverancier;
    }

    /**
    * Set ontvangen
    *
    * @param string $ontvangen
    *
    * @return Ontvangengoederen
    */
    public function setOntvangen ($ontvangen)
    { 
        $this->ontvangen = $ontvangen;

        return $this; 
    }

    /**
    * Get ontvangen
    *
    * @return string
    */
    public function getOntvangen()
    {
        return $this->ontvangen;
    }

    /**
     * Get ontvangstnummer
     *
     * @return int
     */
    public function getOntvangstnummer()
    {
        return $this->ontvangstnummer;
    }
}

