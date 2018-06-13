<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="parking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParkingRepository")
 */
class Parking
{

    /**
     * @ORM\OneToMany(targetEntity="Component", mappedBy="parking")
     *
     */
    private $element;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Condominium", inversedBy="parkings")
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
     * @var int
     *
     * @ORM\Column(name="places", type="integer")
     */
    private $places;


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
     * Set places
     *
     * @param integer $places
     *
     * @return Parking
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }
}

