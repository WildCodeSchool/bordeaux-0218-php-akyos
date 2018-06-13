<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Component
 *
 * @ORM\Table(name="component")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComponentRepository")
 */
class Component
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Common", inversedBy="components")
     *
     */
    private $common;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Parking", inversedBy="components")
     *
     */
    private $parking;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Unit", inversedBy="components")
     *
     */
    private $unit;

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
     * @ORM\Column(name="categorie", type="string", length=128)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=128)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;


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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Component
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Component
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Component
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Component
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set common
     *
     * @param \AppBundle\Entity\Common $common
     *
     * @return Component
     */
    public function setCommon(\AppBundle\Entity\Common $common = null)
    {
        $this->common = $common;

        return $this;
    }

    /**
     * Get common
     *
     * @return \AppBundle\Entity\Common
     */
    public function getCommon()
    {
        return $this->common;
    }

    /**
     * Set parking
     *
     * @param \AppBundle\Entity\Parking $parking
     *
     * @return Component
     */
    public function setParking(\AppBundle\Entity\Parking $parking = null)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return \AppBundle\Entity\Parking
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set unit
     *
     * @param \AppBundle\Entity\Unit $unit
     *
     * @return Component
     */
    public function setUnit(\AppBundle\Entity\Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \AppBundle\Entity\Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
}
