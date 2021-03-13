<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Creation d'un admin
        $admin = new User();
        $admin->setEmail('admin@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'admin'
            ))
            ->setLastname('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_ADMIN']);
        // On persiste l'admin
        $manager->persist($admin);

        $manager->flush();
    }
}
