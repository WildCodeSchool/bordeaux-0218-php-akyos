<?php
    /**
     * Created by PhpStorm.
     * User: kevin
     * Date: 26/06/18
     * Time: 10:19
     */

    namespace AppBundle\DataFixtures;

    use Doctrine\Common\Persistence\ObjectManager;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Symfony\Component\DependencyInjection\ContainerAwareInterface;
    use Symfony\Component\DependencyInjection\ContainerInterface;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface, DependentFixtureInterface
{

    /**
     * @var ContainerInterface
     */

    private $container;
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('admin@dms.com');
        $user->setPlainPassword('wild');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('foncia');
        $user->setEmail('dijon@foncia.com');
        $user->setPlainPassword('wild');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $user->setSyndicate($this->getReference('syndicate0'));

        // Update the user
        $userManager->updateUser($user, true);

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('laforet');
        $user->setEmail('dijon@laforest.com');
        $user->setPlainPassword('wild');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        $user->setSyndicate($this->getReference('syndicate1'));

        // Update the user
        $userManager->updateUser($user, true);
    }

    public function getDependencies()
    {
        return [SyndicateFixtures::class];
    }
}
