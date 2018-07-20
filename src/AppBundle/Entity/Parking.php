<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParkingRepository")
 */
class Parking
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="parking_space", type="integer")
     */
    private $parkingSpace;
    /**
     * @ORM\OneToMany(targetEntity="Component", mappedBy="parking")
     *
     */
    private $components;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Building", inversedBy="parkings")
     *
     */
    private $building;

    /**
     * @ORM\ManyToOne(targetEntity="Condominium", inversedBy="parkings")
     *
     */
    private $condominium;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Intervention", mappedBy="parking")
     */
    private $interventions;


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
     * Set places
     *
     * @param integer $parkingSpace
     *
     * @return Parking
     */
    public function setParkingSpace($parkingSpace)
    {
        $this->parkingSpace = $parkingSpace;

        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getParkingSpace()
    {
        return $this->parkingSpace;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->components = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->parkingSpace . ' places';
    }

    /**
     * Add component
     *
     * @param \AppBundle\Entity\Component $component
     *
     * @return Parking
     */
    public function addComponent(\AppBundle\Entity\Component $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * Remove component
     *
     * @param \AppBundle\Entity\Component $component
     */
    public function removeComponent(\AppBundle\Entity\Component $component)
    {
        $this->components->removeElement($component);
    }

    /**
     * Get components
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Set building
     *
     * @param \AppBundle\Entity\Building $building
     *
     * @return Parking
     */
    public function setBuilding(\AppBundle\Entity\Building $building = null)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \AppBundle\Entity\Building
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Set condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     *
     * @return Parking
     */
    public function setCondominium(\AppBundle\Entity\Condominium $condominium = null)
    {
        $this->condominium = $condominium;

        return $this;
    }

    /**
     * Get condominium
     *
     * @return \AppBundle\Entity\Condominium
     */
    public function getCondominium()
    {
        return $this->condominium;
    }

    /**
     * Add intervention.
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return Parking
     */
    public function addIntervention(\AppBundle\Entity\Intervention $intervention)
    {
        $this->interventions[] = $intervention;

        return $this;
    }

    /**
     * Remove intervention.
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIntervention(\AppBundle\Entity\Intervention $intervention)
    {
        return $this->interventions->removeElement($intervention);
    }

    /**
     * Get interventions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Parking
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
