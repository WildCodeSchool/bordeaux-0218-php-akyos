<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Syndicate", inversedBy="users")
     */
    private $syndicate;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
<<<<<<< HEAD
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
     * Add syndicate
=======
     * Set syndicate
>>>>>>> c95e3325e3c37fefa84d629f418257d2f8c0fd33
     *
     * @param \AppBundle\Entity\Syndicate $syndicate
     *
     * @return User
     */
<<<<<<< HEAD
    public function addSyndicate(\AppBundle\Entity\Syndicate $syndicat)
=======
    public function setSyndicate(\AppBundle\Entity\Syndicate $syndicate = null)
>>>>>>> c95e3325e3c37fefa84d629f418257d2f8c0fd33
    {
        $this->syndicate = $syndicate;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Remove syndicate
     *
     * @param \AppBundle\Entity\Syndicate $syndicat
     */
    public function removeSyndicate(\AppBundle\Entity\Syndicate $syndicat)
    {
        $this->syndicate->removeElement($syndicat);
    }

    /**
     * Get syndicate
     *
     * @return \Doctrine\Common\Collections\Collection
=======
     * Get syndicate
     *
     * @return \AppBundle\Entity\Syndicate
>>>>>>> c95e3325e3c37fefa84d629f418257d2f8c0fd33
     */
    public function getSyndicate()
    {
        return $this->syndicate;
    }
}
