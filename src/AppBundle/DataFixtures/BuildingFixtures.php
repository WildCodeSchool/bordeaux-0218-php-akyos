<?php
/**
 * Created by PhpStorm.
 * User: dupouy
 * Date: 04/07/18
 * Time: 16:04
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Building;
use Faker\Factory;

class BuildingFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 35; $i++) {
            $building = new Building();
            $building->setCondominium($this->getReference('condominium'.$faker->randomElement([0, 1, 2, 3, 4, 5])));
            $building->setName($faker->name);
            $building->setConstructionYear($faker->year($max = 'now'));
            $building->setConstructor($faker->company);
            $building->setCategory($faker->numberBetween($min = 1, $max = 4));
            $building->setEnergyClass($faker->numberBetween($min = 1, $max = 4));
            $building->setUnitsNumber($faker->numberBetween($min = 1, $max = 200));
            $building->setFloorsNumber($faker->numberBetween($min = 0, $max = 10));

            $manager->persist($building);

            $this->addReference('building' . $i, $building);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [CondoFixtures::class];
    }
}
