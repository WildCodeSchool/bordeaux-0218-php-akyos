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
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Intervention;
use AppBundle\Entity\Worker;
use Faker\Factory;

class InterventionFixtures extends Fixture implements DependentFixtureInterface
{

    const SKILLS = array('plumber', 'electrician', 'locksmith');
    const PROGRESS= array('a-venir', 'en-cours', 'archivees');
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


        for ($i = 0; $i < 15; $i++) {
            $intervention = new Intervention();

            $intervention->setWorker($worker);

            $intervention->setProgress($faker
                ->randomElement(self::PROGRESS));

            $intervention->setInterventionType($faker
                ->randomElement(self::SKILLS));

            $intervention->setMaterial($faker->sentence(
                $nbWords = 6,
                $variableNbWords = true
            ));

            $intervention->setEmergency($faker->randomElement(array
            ('low', 'medium', 'major')));

            $intervention->setDescription($faker->text(200));

            $intervention->setRequestDate($faker->dateTimeThisMonth());

            if ($i %2) {
                $intervention->setInterventionDate($faker->dateTimeThisMonth());
            } else {
                $intervention->setInterventionDate(new \DateTime());
            }
            $intervention->setModificationDate($faker->dateTimeThisMonth());

            $intervention->setPaid($faker->boolean(50));

            $intervention->setclientSatisfaction($faker->biasedNumberBetween(
                1,
                5
            ));

            $intervention->setComment($faker->text(200));

            $intervention->setWorkerNumber($faker->biasedNumberBetween(
                1,
                3
            ));

            $intervention->setDuration($faker->randomElement(['120min', '1 jours', '30min']));
            $intervention->setCondominium($this->getReference('condominium1'));

            if ($i % 2) {
                $intervention->setUnit($this->getReference('unit' . $i));
            } else {
                $intervention->setCommon($this->getReference('common' . $i));
            }

            $manager->persist($intervention);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CondoFixtures::class,
            UnitFixtures::class,
            CommonFixtures::class,
            ParkingFixtures::class
        ];
    }
}
