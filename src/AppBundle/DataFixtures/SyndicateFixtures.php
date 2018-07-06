<?php
    /**
     * Created by PhpStorm.
     * syndicate: kevin
     * Date: 26/06/18
     * Time: 11:47
     */

    namespace AppBundle\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;
    use AppBundle\Entity\Syndicate;
    use Faker\Factory;

class SyndicateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $syndicate = new Syndicate();
            $syndicate->setName($faker->company);
            $syndicate->setAddress($faker->address);
            $syndicate->setPhone($faker->phoneNumber);
            $syndicate->setEmail($faker->companyEmail);
            $syndicate->setCondominiumManager($faker->name);

            $manager->persist($syndicate);

            $this->addReference('syndicate' . $i, $syndicate);
        }
        $manager->flush();
    }

}
