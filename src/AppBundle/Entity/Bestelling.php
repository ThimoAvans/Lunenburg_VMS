<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelnummer", type="integer", unique=true)
     */
    private $bestelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=30)
     */
    private $leverancier;


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
     * @return Bestelling
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

