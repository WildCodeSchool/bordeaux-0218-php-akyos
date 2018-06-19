<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterventionSheet
 *
 * @ORM\Table(name="intervention_sheet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InterventionSheet")
 */
class InterventionSheet
{
    /**
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Worker", inversedBy="interventionSheets")
     *
     */
    private $worker;

    /**
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Condominium", inversedBy="interventionSheets")
     *
     */
    private $condominium;

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
     * @ORM\Column(name="progress", type="text")
     */
    private $progress;

    /**
     * @var string
     *
     * @ORM\Column(name="intervention_type", type="text")
     */
    private $interventionType;

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="text")
     */
    private $material;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency", type="string", length=255)
     */
    private $emergency;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_date", type="datetime")
     */
    private $requestDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="intervention_date", type="datetime")
     */
    private $interventionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetime")
     */
    private $modificationDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean")
     */
    private $paid;

    /**
     * @var int
     *
     * @ORM\Column(name="client_satisfaction", type="integer")
     */
    private $clientSatisfaction;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="worker_number", type="integer")
     */
    private $workerNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time")
     */
    private $duration;


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
     * @param string $progress
     *
     * @return InterventionSheet
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get avancement
     *
     * @return string
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set typeIntervention
     *
     * @param string $interventionType
     *
     * @return InterventionSheet
     */
    public function setInterventionType($interventionType)
    {
        $this->interventionType = $interventionType;

        return $this;
    }

    /**
     * Get typeIntervention
     *
     * @return string
     */
    public function getInterventionType()
    {
        return $this->interventionType;
    }

    /**
     * Set fourniture
     *
     * @param string $material
     *
     * @return InterventionSheet
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get fourniture
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set urgence
     *
     * @param string $emergency
     *
     * @return InterventionSheet
     */
    public function setEmergency($emergency)
    {
        $this->emergency = $emergency;

        return $this;
    }

    /**
     * Get urgence
     *
     * @return string
     */
    public function getEmergency()
    {
        return $this->emergency;
    }

    /**
     * Set descriptif
     *
     * @param string $description
     *
     * @return InterventionSheet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $requestDate
     *
     * @return InterventionSheet
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * Set dateIntervention
     *
     * @param \DateTime $interventionDate
     *
     * @return InterventionSheet
     */
    public function setInterventionDate($interventionDate)
    {
        $this->interventionDate = $interventionDate;

        return $this;
    }

    /**
     * Get dateIntervention
     *
     * @return \DateTime
     */
    public function getInterventionDate()
    {
        return $this->interventionDate;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $modificationDate
     *
     * @return InterventionSheet
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
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
     * @param integer $clientSatisfaction
     *
     * @return InterventionSheet
     */
    public function setClientSatisfaction($clientSatisfaction)
    {
        $this->clientSatisfaction = $clientSatisfaction;

        return $this;
    }

    /**
     * Get satisfactionClient
     *
     * @return int
     */
    public function getClientSatisfaction()
    {
        return $this->clientSatisfaction;
    }

    /**
     * Set commentaire
     *
     * @param string $comment
     *
     * @return InterventionSheet
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set nombreIntervenants
     *
     * @param integer $workerNumber
     *
     * @return InterventionSheet
     */
    public function setWorkerNumber($workerNumber)
    {
        $this->workerNumber = $workerNumber;

        return $this;
    }

    /**
     * Get nombreIntervenants
     *
     * @return int
     */
    public function getWorkerNumber()
    {
        return $this->workerNumber;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duration
     *
     * @return InterventionSheet
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set worker
     *
     * @param \AppBundle\Entity\Worker $worker
     *
     * @return InterventionSheet
     */
    public function setWorker(\AppBundle\Entity\Worker $worker = null)
    {
        $this->worker = $worker;

        return $this;
    }

    /**
     * Get worker
     *
     * @return \AppBundle\Entity\Worker
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * Set condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     *
     * @return InterventionSheet
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
}
