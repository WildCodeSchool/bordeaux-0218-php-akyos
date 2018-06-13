<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condominium
 *
 * @ORM\Table(name="copropriete")
 * @ORM\Entity(repositoryClass="CondominiumRepository")
 */
class Condominium
{
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
     * @ORM\ManyToOne(targetEntity="Syndicat", inversedBy="condominium")
     * @ORM\JoinColumn(nullable=false)
     */
    private $syndic;

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
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="charge_copropriete", type="string", length=128)
     */
    private $chargeCopropriete;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=128)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="message_public", type="text", nullable=true)
     */
    private $messagePublic;

    /**
     * @var string
     *
     * @ORM\Column(name="message_prive", type="text", nullable=true)
     */
    private $messagePrive;


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
     * @return Condominium
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
     * @return Condominium
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
     * Set chargeCopropriete
     *
     * @param string $chargeCopropriete
     *
     * @return Condominium
     */
    public function setChargeCopropriete($chargeCopropriete)
    {
        $this->chargeCopropriete = $chargeCopropriete;

        return $this;
    }

    /**
     * Get chargeCopropriete
     *
     * @return string
     */
    public function getChargeCopropriete()
    {
        return $this->chargeCopropriete;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Condominium
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
     * Set mail
     *
     * @param string $mail
     *
     * @return Condominium
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set messagePublic
     *
     * @param string $messagePublic
     *
     * @return Condominium
     */
    public function setMessagePublic($messagePublic)
    {
        $this->messagePublic = $messagePublic;

        return $this;
    }

    /**
     * Get messagePublic
     *
     * @return string
     */
    public function getMessagePublic()
    {
        return $this->messagePublic;
    }

    /**
     * Set messagePrive
     *
     * @param string $messagePrive
     *
     * @return Condominium
     */
    public function setMessagePrive($messagePrive)
    {
        $this->messagePrive = $messagePrive;

        return $this;
    }

    /**
     * Get messagePrive
     *
     * @return string
     */
    public function getMessagePrive()
    {
        return $this->messagePrive;
    }
}

