<?php
/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 04/07/18
 * Time: 16:05
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Parking;
use Faker\Factory;

class ParkingFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 45; $i++) {
            $parking = new Parking();
            $parking->setParkingSpace($faker->numberBetween($min = 20, $max = 100));

            $manager->persist($parking);

            $this->addReference('parking' . $i, $parking);


            $parking->setBuilding($this->getReference('building' . ($i%34)));
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            BuildingFixtures::class,
            CondoFixtures::class
        ];
    }
}
