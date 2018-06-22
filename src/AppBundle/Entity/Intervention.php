<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 *
 * @ORM\Table(name="intervention_sheet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Intervention")
 */
class Intervention
{
    /**
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Worker", inversedBy="interventions")
     *
     */
    private $worker;

    /**
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Condominium", inversedBy="interventions")
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
     * @ORM\Column(name="progress", type="integer")
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
     * Set progress
     *
     * @param string $progress
     *
     * @return Intervention
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
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
     * @return Intervention
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
     * Set material
     *
     * @param string $material
     *
     * @return Intervention
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set emergency
     *
     * @param string $emergency
     *
     * @return Intervention
     */
    public function setEmergency($emergency)
    {
        $this->emergency = $emergency;

        return $this;
    }

    /**
     * Get emergency
     *
     * @return string
     */
    public function getEmergency()
    {
        return $this->emergency;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Intervention
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set requestDate
     *
     * @param \DateTime $requestDate
     *
     * @return Intervention
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    /**
     * Get requestDate
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
     * @return Intervention
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
     * @return Intervention
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
     * @return Intervention
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
     * @return Intervention
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Intervention
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set workerNumber
     *
     * @param integer $workerNumber
     *
     * @return Intervention
     */
    public function setWorkerNumber($workerNumber)
    {
        $this->workerNumber = $workerNumber;

        return $this;
    }

    /**
     * Get Set workerNumber
     *
     * @return int
     */
    public function getWorkerNumber()
    {
        return $this->workerNumber;
    }

    /**
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return Intervention
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
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
     * @return Intervention
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
     * @return Intervention
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
