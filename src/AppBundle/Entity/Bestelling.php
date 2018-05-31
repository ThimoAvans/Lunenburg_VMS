<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelling
 *
 * @ORM\Table(name="bestelling")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestellingRepository")
 */
class Bestelling
{
    /**
     * @var int
     *
     * @ORM\Column(name="bestelnummer", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="bestelnummer")
     */
    public $bestelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=30)
     */
    private $leverancier;

    public function __construct()
    {
        $this->bestellingen = new ArrayCollection();
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
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Bestelling
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
}

