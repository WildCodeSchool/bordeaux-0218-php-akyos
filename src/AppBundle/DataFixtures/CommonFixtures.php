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
use AppBundle\Entity\Common;
use Faker\Factory;

class CommonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 45; $i++) {
            $common = new Common();
            $common->setName($faker->name);

            $manager->persist($common);

            $this->addReference('common' . $i, $common);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return CondoFixtures::class;
        return BuildingFixtures::class;
    }
}
