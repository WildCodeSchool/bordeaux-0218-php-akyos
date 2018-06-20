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
     * Set syndicate
     *
     * @param \AppBundle\Entity\Syndicate $syndicate
     *
     * @return User
     */
    public function setSyndicate(\AppBundle\Entity\Syndicate $syndicate = null)
    {
        $this->syndicate = $syndicate;

        return $this;
    }

    /**
     * Get syndicate
     *
     * @return \AppBundle\Entity\Syndicate
     */
    public function getSyndicate()
    {
        return $this->syndicate;
    }
}
