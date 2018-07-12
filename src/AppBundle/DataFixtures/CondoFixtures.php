<?php
/**
 * Created by PhpStorm.
 * syndicate: kevin
 * Date: 26/06/18
 * Time: 11:47
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Condominium;
use Faker\Factory;

class CondoFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 5; $i++) {
            $condominium = new Condominium();
            $condominium->setName($faker->name);
            $condominium->setAddress($faker->address);
            $condominium->setCondominiumManager($faker->name);
            $condominium->setPhone($faker->phoneNumber);
            $condominium->setEmail($faker->companyEmail);
            $condominium->setPublicMessage($faker->text);
            $condominium->setPrivateMessage($faker->text);
            $condominium->setSyndicate($this->getReference('syndicate1'));

            $manager->persist($condominium);

            $this->addReference('condominium' . $i, $condominium);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [SyndicateFixtures::class];
    }
}
