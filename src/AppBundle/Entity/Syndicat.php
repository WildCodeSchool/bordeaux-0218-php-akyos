<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Syndicat
 *
 * @ORM\Table(name="syndicat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SyndicatRepository")
 */
class Syndicat
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Condominium", mappedBy="syndicats")
     */
    private $condominium;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="syndicats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="Telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=128)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="ChargeCopro", type="string", length=255)
     */
    private $chargeCopro;


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
     * @return Syndicat
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Syndicat
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Syndicat
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Syndicat
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set chargeCopro
     *
     * @param string $chargeCopro
     *
     * @return Syndicat
     */
    public function setChargeCopro($chargeCopro)
    {
        $this->chargeCopro = $chargeCopro;

        return $this;
    }

    /**
     * Get chargeCopro
     *
     * @return string
     */
    public function getChargeCopro()
    {
        return $this->chargeCopro;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->condominium = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     *
     * @return Syndicat
     */
    public function addCondominium(\AppBundle\Entity\Condominium $condominium)
    {
        $this->condominium[] = $condominium;

        return $this;
    }

    /**
     * Remove condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     */
    public function removeCondominium(\AppBundle\Entity\Condominium $condominium)
    {
        $this->condominium->removeElement($condominium);
    }

    /**
     * Get condominium
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCondominium()
    {
        return $this->condominium;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Syndicat
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
