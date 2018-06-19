<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worker
 *
 * @ORM\Table(name="worker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkerRepository")
 */
class Worker
{

    /**
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\InterventionSheet", mappedBy="worker")
     *
     */
    private $interventionSheets;

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
     * @ORM\Column(name="last_name", type="string", length=128)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=128)
     */
    private $firstName;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="competence", type="string", length=255)
     */
    private $competence;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * @param string $lastName
     *
     * @return Worker
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set prenom
     *
     * @param string $firstName
     *
     * @return Worker
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set telephone
     *
     * @param integer $phone
     *
     * @return Worker
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
     * Set specialite
     *
     * @param string $competence
     *
     * @return Worker
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set adresse
     *
     * @param string $adress
     *
     * @return Worker
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
     * Set mail
     *
     * @param string $email
     *
     * @return Worker
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
     * Constructor
     */
    public function __construct()
    {
        $this->interventionSheets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add interventionSheet
     *
     * @param \AppBundle\Entity\InterventionSheet $interventionSheet
     *
     * @return Worker
     */
    public function addInterventionSheet(\AppBundle\Entity\InterventionSheet $interventionSheet)
    {
        $this->interventionSheets[] = $interventionSheet;

        return $this;
    }

    /**
     * Remove interventionSheet
     *
     * @param \AppBundle\Entity\InterventionSheet $interventionSheet
     */
    public function removeInterventionSheet(\AppBundle\Entity\InterventionSheet $interventionSheet)
    {
        $this->interventionSheets->removeElement($interventionSheet);
    }

    /**
     * Get interventionSheets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterventionSheets()
    {
        return $this->interventionSheets;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Worker
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
