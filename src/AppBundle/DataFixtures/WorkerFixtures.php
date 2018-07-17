<?php
/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 09/07/18
 * Time: 14:29

/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 20/06/18
 * Time: 15:07
 */

// src/AppBundle/DataFixtures/AppFixtures.php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Worker;
use Faker\Factory;

class WorkerFixtures extends Fixture
{

    const SKILLS = array('plumber', 'electrician', 'locksmith');
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $worker = new Worker();

            $worker->setFirstName($faker->firstName);
            $worker->setLastName($faker->lastName);
            $worker->setCompetence($faker->randomElement(self::SKILLS));
            $worker->setPhone($faker->phoneNumber);
            $worker->setAddress($faker->address);
            $worker->setEmail($faker->freeEmail);

            $manager->persist($worker);
        }
    }
}
