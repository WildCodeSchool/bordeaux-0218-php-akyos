<?php
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
use AppBundle\Entity\Intervention;
use AppBundle\Entity\Worker;
use Faker\Factory;

class AppFixtures extends Fixture
{

    const SKILLS = ['plumber', 'electrician', 'locksmith'];
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        //generate worker
        for ($i = 0; $i < 5; $i++) {

            $worker = new Worker();

            $worker->setFirstName($faker->firstName);
            $worker->setLastName($faker->lastName);
            $worker->setCompetence($faker->randomElement(self::SKILLS));
            $worker->setPhone($faker->phoneNumber);
            $worker->setAdress($faker->address);
            $worker->setEmail($faker->freeEmail);

            $manager->persist($worker);
        }
        //generate intervention
        for ($i = 0; $i < 15; $i++) {

            $intervention = new Intervention();

            $intervention->setWorker($worker);

            $intervention->setProgress($faker
                ->randomElement(array('Scheduled', 'done', 're-schedule')));

            $intervention->setInterventionType($faker
                ->randomElement(self::SKILLS));

            $intervention->setMaterial($faker->sentence
            ($nbWords = 6, $variableNbWords = true));

            $intervention->setEmergency($faker->randomElement(array
            ('low', 'medium', 'major')));

            $intervention->setDescription($faker->text($maxNbChars = 200));

            $intervention->setRequestDate($faker->dateTimeThisMonth());
            $intervention->setInterventionDate($faker->dateTimeThisMonth());
            $intervention->setModificationDate($faker->dateTimeThisMonth());

            $intervention->setPaid($faker->boolean($chanceOfGettingTrue = 50));

            $intervention->setclientSatisfaction($faker->biasedNumberBetween
            (1, 5));

            $intervention->setComment($faker->text($maxNbChars = 200));

            $intervention->setWorkerNumber($faker->biasedNumberBetween
            (1, 3));

            $intervention->setDuration($faker->dateTime());

            $manager->persist($intervention);
        }
        $manager->flush();
    }
}
