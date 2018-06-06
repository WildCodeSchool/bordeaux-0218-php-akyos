<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Batiment
 *
 * @ORM\Table(name="batiment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BatimentRepository")
 */
class Batiment
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
     * @return Batiment
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
     * @return Batiment
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
     * @return Batiment
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
     * @return Batiment
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
     * @return Batiment
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
     * @return Batiment
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
     * @return Batiment
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
}

