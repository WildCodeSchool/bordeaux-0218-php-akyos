<?php
/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 04/07/18
 * Time: 16:14
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Component;
use Faker\Factory;

class ComponentFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $component = new Component();
            $component->setCategory($faker->realText($maxNbChars = 128, $indexSize = 2));
            $component->setType($faker->realText($maxNbChars = 128, $indexSize = 2));
            $component->setPhoto($faker->realText($maxNbChars = 255, $indexSize = 2));
            $component->setReference($faker->realText($maxNbChars = 255, $indexSize = 2));


            $manager->persist($component);

            $this->addReference('component' . $i, $component);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return UnitFixtures::class;
        ParkingFixtures::class;
        CondoFixtures::class;
    }
}
