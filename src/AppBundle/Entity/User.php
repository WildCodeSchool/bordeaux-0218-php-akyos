<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\ManyToOne(targetEntity="Syndicate", inversedBy="users")
     */
    private $syndicate;

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
     * @ORM\Column(name="login", type="string", length=128)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128)
     */
    private $password;


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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->syndicate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->workers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add syndicat
     *
     * @param \AppBundle\Entity\Syndicate $syndicat
     *
     * @return User
     */
    public function addSyndicat(\AppBundle\Entity\Syndicate $syndicat)
    {
        $this->syndicate[] = $syndicat;

        return $this;
    }

    /**
     * Remove syndicat
     *
     * @param \AppBundle\Entity\Syndicate $syndicat
     */
    public function removeSyndicat(\AppBundle\Entity\Syndicate $syndicat)
    {
        $this->syndicate->removeElement($syndicat);
    }

    /**
     * Get syndicats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSyndicate()
    {
        return $this->syndicate;
    }

    /**
     * Add worker
     *
     * @param \AppBundle\Entity\Worker $worker
     *
     * @return User
     */
    public function addWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers[] = $worker;

        return $this;
    }

    /**
     * Remove worker
     *
     * @param \AppBundle\Entity\Worker $worker
     */
    public function removeWorker(\AppBundle\Entity\Worker $worker)
    {
        $this->workers->removeElement($worker);
    }

    /**
     * Get workers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkers()
    {
        return $this->workers;
    }
}
