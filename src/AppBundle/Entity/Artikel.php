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
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="artikelnummer")
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=50)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=255)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischeSpecificaties", type="string", length=255, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="gereserveerdeVoorraad", type="integer")
     */
    public $gereserveerdeVoorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="_gereserveerdeVoorraad", type="integer")
     */
    public $_gereserveerdeVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    public $bestelserie;

    /**
     * @var string
     *
     * @ORM\Column(name="actief", type="string", length=3, nullable=true)
     */
    public $actief;


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
     * Set naam
     *
     * @param integer $naam
     *
     * @return Naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return int
     */
    public function getNaam()
    {
        return $this->naam;
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
     * Set actief
     *
     * @param string $actief
     *
     * @return Artikel
     */
    public function setActief($actief)
    {
        $this->actief = $actief;

        return $this;
    }

    /**
     * Get actief
     *
     * @return string
     */
    public function getactief()
    {
        return $this->actief;
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
     * Set gereserveerdeVoorraad
     *
     * @param string $gereserveerdeVoorraad
     *
     * @return Artikel
     */
    public function setGereserveerdeVoorraad($gereserveerdeVoorraad)
    {
        $this->gereserveerdeVoorraad = $gereserveerdeVoorraad;

        return $this;
    }

    /**
     * Get gereserveerdeVoorraad
     *
     * @return string
     */
    public function getGereserveerdeVoorraad()
    {
        return $this->gereserveerdeVoorraad;
    }

    /**
     * Set _gereserveerdeVoorraad
     *
     * @param string $_gereserveerdeVoorraad
     *
     * @return Artikel
     */
    public function set_GereserveerdeVoorraad($gereserveerdeVoorraad)
    {
        $this->_gereserveerdeVoorraad = $_gereserveerdeVoorraad;

        return $this;
    }

    /**
     * Get _gereserveerdeVoorraad
     *
     * @return string
     */
    public function get_GereserveerdeVoorraad()
    {
        return $this->_gereserveerdeVoorraad;
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

    public function __toString() {
        return (string) $this->artikelnummer;
    }
}

