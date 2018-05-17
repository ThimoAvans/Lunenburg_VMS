<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestellen
 *
 * @ORM\Table(name="bestellen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestellenRepository")
 */
class Bestellen
{
    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=255)
     */
    private $leverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelordernummer", type="integer", unique=true)
     * @ORM\Id
     */
    private $bestelordernummer;

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
     * @ORM\ManyToMany(targetEntity="Artikel", inversedBy="bestelopdracht", cascade={"persist"})
     */
    private $artikelen;

    public function __construct() {
        $this->bestellen = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Bestellen
     */
    public function setleverancier($leverancier)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return string
     */
    public function getleverancier()
    {
        return $this->leverancier;
    }

    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Bestellen
     */
    public function setBestelordernummer($bestelordernummer)
    {
        $this->bestelordernummer = $bestelordernummer;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getBestelordernummer()
    {
        return $this->bestelordernummer;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Bestellen
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
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Bestellen
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
}

