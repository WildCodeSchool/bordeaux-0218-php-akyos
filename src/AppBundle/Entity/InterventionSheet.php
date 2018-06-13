<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterventionSheet
 *
 * @ORM\Table(name="fiche_intervention")
 * @ORM\Entity(repositoryClass="InterventionSheet")
 */
class InterventionSheet
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
     * @ORM\Column(name="avancement", type="text")
     */
    private $avancement;

    /**
     * @var string
     *
     * @ORM\Column(name="type_intervention", type="text")
     */
    private $typeIntervention;

    /**
     * @var string
     *
     * @ORM\Column(name="fourniture", type="text")
     */
    private $fourniture;

    /**
     * @var string
     *
     * @ORM\Column(name="urgence", type="string", length=255)
     */
    private $urgence;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="datetime")
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateIntervention", type="datetime")
     */
    private $dateIntervention;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean")
     */
    private $paid;

    /**
     * @var int
     *
     * @ORM\Column(name="satisfactionClient", type="integer")
     */
    private $satisfactionClient;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreIntervenants", type="integer")
     */
    private $nombreIntervenants;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time")
     */
    private $duree;


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
     * Set avancement
     *
     * @param string $avancement
     *
     * @return InterventionSheet
     */
    public function setAvancement($avancement)
    {
        $this->avancement = $avancement;

        return $this;
    }

    /**
     * Get avancement
     *
     * @return string
     */
    public function getAvancement()
    {
        return $this->avancement;
    }

    /**
     * Set typeIntervention
     *
     * @param string $typeIntervention
     *
     * @return InterventionSheet
     */
    public function setTypeIntervention($typeIntervention)
    {
        $this->typeIntervention = $typeIntervention;

        return $this;
    }

    /**
     * Get typeIntervention
     *
     * @return string
     */
    public function getTypeIntervention()
    {
        return $this->typeIntervention;
    }

    /**
     * Set fourniture
     *
     * @param string $fourniture
     *
     * @return InterventionSheet
     */
    public function setFourniture($fourniture)
    {
        $this->fourniture = $fourniture;

        return $this;
    }

    /**
     * Get fourniture
     *
     * @return string
     */
    public function getFourniture()
    {
        return $this->fourniture;
    }

    /**
     * Set urgence
     *
     * @param string $urgence
     *
     * @return InterventionSheet
     */
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get urgence
     *
     * @return string
     */
    public function getUrgence()
    {
        return $this->urgence;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     *
     * @return InterventionSheet
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return InterventionSheet
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateIntervention
     *
     * @param \DateTime $dateIntervention
     *
     * @return InterventionSheet
     */
    public function setDateIntervention($dateIntervention)
    {
        $this->dateIntervention = $dateIntervention;

        return $this;
    }

    /**
     * Get dateIntervention
     *
     * @return \DateTime
     */
    public function getDateIntervention()
    {
        return $this->dateIntervention;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return InterventionSheet
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     *
     * @return InterventionSheet
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return bool
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set satisfactionClient
     *
     * @param integer $satisfactionClient
     *
     * @return InterventionSheet
     */
    public function setSatisfactionClient($satisfactionClient)
    {
        $this->satisfactionClient = $satisfactionClient;

        return $this;
    }

    /**
     * Get satisfactionClient
     *
     * @return int
     */
    public function getSatisfactionClient()
    {
        return $this->satisfactionClient;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return InterventionSheet
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set nombreIntervenants
     *
     * @param integer $nombreIntervenants
     *
     * @return InterventionSheet
     */
    public function setNombreIntervenants($nombreIntervenants)
    {
        $this->nombreIntervenants = $nombreIntervenants;

        return $this;
    }

    /**
     * Get nombreIntervenants
     *
     * @return int
     */
    public function getNombreIntervenants()
    {
        return $this->nombreIntervenants;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return InterventionSheet
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }
}

