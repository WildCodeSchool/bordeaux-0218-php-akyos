<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condominium
 *
 * @ORM\Table(name="condominium")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CondominiumRepository")
 */
class Condominium
{
    /**
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\Intervention", mappedBy="condominium")
     *
     */
    private $interventions;

    /**
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\Common", mappedBy="condominium")
     *
     */
    private $commons;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Parking", mappedBy="condominium")
     */
    private $parkings;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Building", mappedBy="condominium")
     *
     */
    private $buildings;

    /**
     * @ORM\ManyToOne(targetEntity="Syndicate", inversedBy="condominiums")
     * @ORM\JoinColumn(nullable=false)
     */
    private $syndicate;

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
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="condominium_manager", type="string", length=128)
     */
    private $condominiumManager;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="public_message", type="text", nullable=true)
     */
    private $publicMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="private_message", type="text", nullable=true)
     */
    private $privateMessage;


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
     * Set nom
     *
     * @param string $name
     *
     * @return Condominium
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adresse
     *
     * @param string $adress
     *
     * @return Condominium
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set chargeCopropriete
     *
     * @param string $condominiumManager
     *
     * @return Condominium
     */
    public function setCondominiumManager($condominiumManager)
    {
        $this->condominiumManager = $condominiumManager;

        return $this;
    }

    /**
     * Get chargeCopropriete
     *
     * @return string
     */
    public function getCondominiumManager()
    {
        return $this->condominiumManager;
    }

    /**
     * Set telephone
     *
     * @param integer $phone
     *
     * @return Condominium
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $email
     *
     * @return Condominium
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set messagePublic
     *
     * @param string $publicMessage
     *
     * @return Condominium
     */
    public function setPublicMessage($publicMessage)
    {
        $this->publicMessage = $publicMessage;

        return $this;
    }

    /**
     * Get messagePublic
     *
     * @return string
     */
    public function getPublicMessage()
    {
        return $this->publicMessage;
    }

    /**
     * Set messagePrive
     *
     * @param string $privateMessage
     *
     * @return Condominium
     */
    public function setPrivateMessage($privateMessage)
    {
        $this->privateMessage = $privateMessage;

        return $this;
    }

    /**
     * Get messagePrive
     *
     * @return string
     */
    public function getPrivateMessage()
    {
        return $this->privateMessage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->interventions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parkings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->buildings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add interventionsSheet
     *
     * @param \AppBundle\Entity\Intervention $interventionsSheet
     *
     * @return Condominium
     */
    public function addInterventionsSheet(\AppBundle\Entity\Intervention $interventionsSheet)
    {
        $this->interventions[] = $interventionsSheet;

        return $this;
    }

    /**
     * Remove interventionsSheet
     *
     * @param \AppBundle\Entity\Intervention $interventionsSheet
     */
    public function removeInterventionsSheet(\AppBundle\Entity\Intervention $interventionsSheet)
    {
        $this->interventions->removeElement($interventionsSheet);
    }

    /**
     * Get interventionsSheets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    /**
     * Add common
     *
     * @param \AppBundle\Entity\Common $common
     *
     * @return Condominium
     */
    public function addCommon(\AppBundle\Entity\Common $common)
    {
        $this->commons[] = $common;

        return $this;
    }

    /**
     * Remove common
     *
     * @param \AppBundle\Entity\Common $common
     */
    public function removeCommon(\AppBundle\Entity\Common $common)
    {
        $this->commons->removeElement($common);
    }

    /**
     * Get commons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommons()
    {
        return $this->commons;
    }

    /**
     * Add parking
     *
     * @param \AppBundle\Entity\Parking $parking
     *
     * @return Condominium
     */
    public function addParking(\AppBundle\Entity\Parking $parking)
    {
        $this->parkings[] = $parking;

        return $this;
    }

    /**
     * Remove parking
     *
     * @param \AppBundle\Entity\Parking $parking
     */
    public function removeParking(\AppBundle\Entity\Parking $parking)
    {
        $this->parkings->removeElement($parking);
    }

    /**
     * Get parkings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParkings()
    {
        return $this->parkings;
    }

    /**
     * Add building
     *
     * @param \AppBundle\Entity\Building $building
     *
     * @return Condominium
     */
    public function addBuilding(\AppBundle\Entity\Building $building)
    {
        $this->buildings[] = $building;

        return $this;
    }

    /**
     * Remove building
     *
     * @param \AppBundle\Entity\Building $building
     */
    public function removeBuilding(\AppBundle\Entity\Building $building)
    {
        $this->buildings->removeElement($building);
    }

    /**
     * Get buildings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBuildings()
    {
        return $this->buildings;
    }

    /**
     * Set syndic
     *
     * @param \AppBundle\Entity\Syndicate $syndicate
     *
     * @return Condominium
     */
    public function setSyndicate(\AppBundle\Entity\Syndicate $syndicate)
    {
        $this->syndicate = $syndicate;

        return $this;
    }

    /**
     * Get syndic
     *
     * @return \AppBundle\Entity\Syndicate
     */
    public function getSyndicate()
    {
        return $this->syndicate;
    }
}
