<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{
    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=50)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischeSpecificaties", type="string", length=60, nullable=true)
     */
    private $technischeSpecificaties;

    /**
     * @var string
     *
     * @ORM\Column(name="magazijnlocatie", type="string", length=30)
     * @Assert\Regex(
         *    pattern = "/^20|[0-1]{1}[0-9]{1}\/[A-Z][0]{1}[0-9]{1}|10$/i",
         *    match=true,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Regex(
         *    pattern = "/^[2]{1}[1-9]{1}\/[A-Z]{1}[0-9]{1}$/i",
         *    match=false,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Regex(
         *    pattern = "/^[3-9]{1}[0-9]{1}\/[A-Z][0-9]{1}$/i",
         *    match=false,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Regex(
         *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][1]{1}[1-9]{1}$/i",
         *    match=false,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Regex(
         *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][2-9]{1}[0-9]{1}$/i",
         *    match=false,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Regex(
         *    pattern = "/^[0-9A-Za-z]+$/i",
         *    match=false,
         *    message="De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden.")
         * @Assert\Length(
         *      max = 6,
         *      maxMessage = "De magazijnlocatie dient zich tussen 01/A01 en 20/Z10 te bevinden."
         * )
     */
    private $magazijnlocatie;

    /**
     * @var decimal
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=1)
     */
    private $inkoopprijs;

    /**
     * @var string
     *
     * @ORM\Column(name="vervangendArtikel", type="string", length=50)
     */
    private $vervangendArtikel;

    /**
     * @var int
     *
     * @ORM\Column(name="minimumVoorraad", type="integer")
     */
    public $minimumVoorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="huidigeVoorraad", type="integer")
     */
    public $huidigeVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    public $bestelserie;

    // *
    //  * @var int
    //  *
    //  * @ORM\ManyToOne(targetEntity="Bestellen", inversedBy="artikelen")
    //  * @ORM\JoinColumn(name="artikelnummer", referencedColumnName="bestelordernummer")
     
    // private $bestelopdracht;

    /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="Bestellen", inversedBy="artikelen", cascade={"persist"})
     */
    private $bestelopdracht;

    /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="OntvangenGoederen", inversedBy="ontvangengoederen", cascade={"persist"})
     */
    private $goederenopdracht;

    public function __construct() {
        $this->artikelen = new ArrayCollection();
    }

    // /**
    //  * Set id
    //  *
    //  * @param string $id
    //  *
    //  * @return Product
    //  */
    // public function setId($id)
    // {
    //     $this->id = $id;

    //     return $this;
    // }

    // /**
    //  * Get id
    //  *
    //  * @return int
    //  */
    // public function getId()
    // {
    //     return $this->id;
    // }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Artikel
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
     * @return Artikel
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
     * Set technischeSpecificaties
     *
     * @param string $technischeSpecificaties
     *
     * @return Artikel
     */
    public function setTechnischeSpecificaties($technischeSpecificaties)
    {
        $this->technischeSpecificaties = $technischeSpecificaties;

        return $this;
    }

    /**
     * Get technischeSpecificaties
     *
     * @return string
     */
    public function getTechnischeSpecificaties()
    {
        return $this->technischeSpecificaties;
    }

    /**
     * Set magazijnlocatie
     *
     * @param string $magazijnlocatie
     *
     * @return Artikel
     */
    public function setMagazijnlocatie($magazijnlocatie)
    {
        $this->magazijnlocatie = $magazijnlocatie;

        return $this;
    }

    /**
     * Get magazijnlocatie
     *
     * @return string
     */
    public function getMagazijnlocatie()
    {
        return $this->magazijnlocatie;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return Artikel
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set vervangendArtikel
     *
     * @param string $vervangendArtikel
     *
     * @return Artikel
     */
    public function setVervangendArtikel($vervangendArtikel)
    {
        $this->vervangendArtikel = $vervangendArtikel;

        return $this;
    }

    /**
     * Get vervangendArtikel
     *
     * @return string
     */
    public function getVervangendArtikel()
    {
        return $this->vervangendArtikel;
    }

    /**
     * Set minimumVoorraad
     *
     * @param integer $minimumVoorraad
     *
     * @return Artikel
     */
    public function setMinimumVoorraad($minimumVoorraad)
    {
        $this->minimumVoorraad = $minimumVoorraad;

        return $this;
    }

    /**
     * Get minimumVoorraad
     *
     * @return int
     */
    public function getMinimumVoorraad()
    {
        return $this->minimumVoorraad;
    }

    /**
     * Set huidigeVoorraad
     *
     * @param string $huidigeVoorraad
     *
     * @return Artikel
     */
    public function setHuidigeVoorraad($huidigeVoorraad)
    {
        $this->huidigeVoorraad = $huidigeVoorraad;

        return $this;
    }

    /**
     * Get huidigeVoorraad
     *
     * @return string
     */
    public function getHuidigeVoorraad()
    {
        return $this->huidigeVoorraad;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
     *
     * @return Artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }
}

