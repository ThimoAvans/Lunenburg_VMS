<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Gebruiker
 *
 * @ORM\Table(name="gebruiker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GebruikerRepository")
 */
abstract class Gebruiker implements UserInterface, \Serializable
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
     * @var string
     *
     * @ORM\Column(name="naam", length=20, unique=true)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="wachtwoord", length=50)
     */
    private $wachtwoord;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

     public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }

 public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

     public function getRoles()
    {
        return array('ROLE_USER');
    }

     public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

     /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Set naam
     *
     * @param string $naam
     *
     * @return Gebruiker
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    
        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set wachtwoord
     *
     * @param string $wachtwoord
     *
     * @return Gebruiker
     */
    public function setWachtwoord($wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;
    
        return $this;
    }

    /**
     * Get wachtwoord
     *
     * @return string
     */
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Gebruiker
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}

