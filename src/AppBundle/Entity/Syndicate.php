<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Syndicate
 *
 * @ORM\Table(name="syndicate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SyndicateRepository")
 */
class Syndicate
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Condominium", mappedBy="syndicate")
     */
    private $condominiums;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="syndicate")
     */
    private $users;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="condominium_manager", type="string", length=255)
     */
    private $condominiumManager;
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
     * @return Syndicate
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
     * Set adresse
     *
     * @param string $adress
     *
     * @return Syndicate
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
     * Set telephone
     *
     * @param integer $phone
     *
     * @return Syndicate
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
     * Set email
     *
     * @param string $email
     *
     * @return Syndicate
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
     * @param string $condominiumManager
     *
     * @return Syndicate
     */
    public function setCondominiumManager($condominiumManager)
    {
        $this->condominiumManager = $condominiumManager;

        return $this;
    }

    /**
     * Get chargeCopro
     *
     * @return string
     */
    public function getCondominiumManager()
    {
        return $this->condominiumManager;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->condominiums = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     *
     * @return Syndicate
     */
    public function addCondominium(\AppBundle\Entity\Condominium $condominium)
    {
        $this->condominiums[] = $condominium;

        return $this;
    }

    /**
     * Remove condominium
     *
     * @param \AppBundle\Entity\Condominium $condominium
     */
    public function removeCondominium(\AppBundle\Entity\Condominium $condominium)
    {
        $this->condominiums->removeElement($condominium);
    }

    /**
     * Get condominium
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCondominiums()
    {
        return $this->condominiums;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $users
     *
     * @return Syndicate
     */
    public function setUsers(\AppBundle\Entity\User $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Syndicate
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

     /****************************************/
    /* Manual Generated methods / variables */
    public function __toString()
    {
        return "$this->name";
    }
}
