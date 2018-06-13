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
     * @ORM\Column(name="nom", type="string", length=128)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="annee_de_construction", type="integer")
     */
    private $anneeDeConstruction;

    /**
     * @var string
     *
     * @ORM\Column(name="constructeur", type="string", length=255)
     */
    private $constructeur;

    /**
     * @var int
     *
     * @ORM\Column(name="categorie", type="integer")
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="classe_energetique", type="integer")
     */
    private $classeEnergetique;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_de_lots", type="integer")
     */
    private $nombreDeLots;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_d_etages", type="integer")
     */
    private $nombreDEtages;


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
     * @param string $nom
     *
     * @return Building
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set anneeDeConstruction
     *
     * @param integer $anneeDeConstruction
     *
     * @return Building
     */
    public function setAnneeDeConstruction($anneeDeConstruction)
    {
        $this->anneeDeConstruction = $anneeDeConstruction;

        return $this;
    }

    /**
     * Get anneeDeConstruction
     *
     * @return int
     */
    public function getAnneeDeConstruction()
    {
        return $this->anneeDeConstruction;
    }

    /**
     * Set constructeur
     *
     * @param string $constructeur
     *
     * @return Building
     */
    public function setConstructeur($constructeur)
    {
        $this->constructeur = $constructeur;

        return $this;
    }

    /**
     * Get constructeur
     *
     * @return string
     */
    public function getConstructeur()
    {
        return $this->constructeur;
    }

    /**
     * Set categorie
     *
     * @param integer $categorie
     *
     * @return Building
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return int
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set classeEnergetique
     *
     * @param integer $classeEnergetique
     *
     * @return Building
     */
    public function setClasseEnergetique($classeEnergetique)
    {
        $this->classeEnergetique = $classeEnergetique;

        return $this;
    }

    /**
     * Get classeEnergetique
     *
     * @return int
     */
    public function getClasseEnergetique()
    {
        return $this->classeEnergetique;
    }

    /**
     * Set nombreDeLots
     *
     * @param integer $nombreDeLots
     *
     * @return Building
     */
    public function setNombreDeLots($nombreDeLots)
    {
        $this->nombreDeLots = $nombreDeLots;

        return $this;
    }

    /**
     * Get nombreDeLots
     *
     * @return int
     */
    public function getNombreDeLots()
    {
        return $this->nombreDeLots;
    }

    /**
     * Set nombreDEtages
     *
     * @param integer $nombreDEtages
     *
     * @return Building
     */
    public function setNombreDEtages($nombreDEtages)
    {
        $this->nombreDEtages = $nombreDEtages;

        return $this;
    }

    /**
     * Get nombreDEtages
     *
     * @return int
     */
    public function getNombreDEtages()
    {
        return $this->nombreDEtages;
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
