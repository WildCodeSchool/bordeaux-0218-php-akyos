<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Building
 *
 * @ORM\Table(name="building")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuildingRepository")
 */
class Building
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Common", mappedBy="building")
     *
     */
    private $commons;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Parking", mappedBy="building")
     */
    private $parkings;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Condominium", inversedBy="buildings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $condominium;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Unit", mappedBy="building")
     *
     */
    private $units;

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
     * @var int
     *
     * @ORM\Column(name="construction_year", type="integer")
     */
    private $constructionYear;

    /**
     * @var string
     *
     * @ORM\Column(name="constructor", type="string", length=255)
     */
    private $constructor;

    /**
     * @var int
     *
     * @ORM\Column(name="category", type="integer")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="energy_class", type="integer")
     */
    private $energyClass;

    /**
     * @var int
     *
     * @ORM\Column(name="unit_number", type="integer")
     */
    private $unitsNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="floors_number", type="integer")
     */
    private $floorsNumber;


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
     * @return Building
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
     * Set anneeDeConstruction
     *
     * @param integer $constructionYear
     *
     * @return Building
     */
    public function setConstructionyear($constructionYear)
    {
        $this->constructionYear = $constructionYear;

        return $this;
    }

    /**
     * Get anneeDeConstruction
     *
     * @return int
     */
    public function getConstructionyear()
    {
        return $this->constructionYear;
    }

    /**
     * Set constructeur
     *
     * @param string $constructor
     *
     * @return Building
     */
    public function setConstructor($constructor)
    {
        $this->constructor = $constructor;

        return $this;
    }

    /**
     * Get constructeur
     *
     * @return string
     */
    public function getConstructor()
    {
        return $this->constructor;
    }

    /**
     * Set categorie
     *
     * @param integer $category
     *
     * @return Building
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set classeEnergetique
     *
     * @param integer $energyClass
     *
     * @return Building
     */
    public function setEnergyclass($energyClass)
    {
        $this->energyClass = $energyClass;

        return $this;
    }

    /**
     * Get classeEnergetique
     *
     * @return int
     */
    public function getEnergyclass()
    {
        return $this->energyClass;
    }

    /**
     * Set nombreDeLots
     *
     * @param integer $unitsNumber
     *
     * @return Building
     */
    public function setUnitsNumber($unitsNumber)
    {
        $this->unitsNumber = $unitsNumber;

        return $this;
    }

    /**
     * Get nombreDeLots
     *
     * @return int
     */
    public function getUnitsNumber()
    {
        return $this->unitsNumber;
    }

    /**
     * Set nombreDEtages
     *
     * @param integer $floorsNumber
     *
     * @return Building
     */
    public function setFloorsNumber($floorsNumber)
    {
        $this->floorsNumber = $floorsNumber;

        return $this;
    }

    /**
     * Get nombreDEtages
     *
     * @return int
     */
    public function getFloorsNumber()
    {
        return $this->floorsNumber;
    }

    /**
     * @return mixed
     */
    public function getCommons()
    {
        return $this->commons;
    }

    /**
     * @param mixed $commons
     */
    public function setCommons($commons)
    {
        $this->commons = $commons;
    }

    /**
     * @return mixed
     */
    public function getParkings()
    {
        return $this->parkings;
    }

    /**
     * @param mixed $parkings
     */
    public function setParkings($parkings)
    {
        $this->parkings = $parkings;
    }

    /**
     * @return mixed
     */
    public function getCondominium()
    {
        return $this->condominium;
    }

    /**
     * @param mixed $condominium
     */
    public function setCondominium($condominium)
    {
        $this->condominium = $condominium;
    }

    /**
     * @return mixed
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param mixed $units
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parkings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add common
     *
     * @param \AppBundle\Entity\Common $common
     *
     * @return Building
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
     * Add parking
     *
     * @param \AppBundle\Entity\Parking $parking
     *
     * @return Building
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
     * Add unit
     *
     * @param \AppBundle\Entity\Unit $unit
     *
     * @return Building
     */
    public function addUnit(\AppBundle\Entity\Unit $unit)
    {
        $this->units[] = $unit;

        return $this;
    }

    /**
     * Remove unit
     *
     * @param \AppBundle\Entity\Unit $unit
     */
    public function removeUnit(\AppBundle\Entity\Unit $unit)
    {
        $this->units->removeElement($unit);
    }
}
