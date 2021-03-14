<?php

namespace App\DataFixtures;

use App\Entity\PlanningType;
use App\Entity\Subject;
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

        // Creation d'un formateur
        $admin = new User();
        $admin->setEmail('formateur@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'formateur'
            ))
            ->setLastname('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_ADMIN']);
        // On persiste l'admin
        $manager->persist($admin);

        //Ajout matière
        $subject = new Subject();
        $subject->setName('Java')
            ->setTTHour(100);
        // On persiste l'admin
        $manager->persist($subject);

        //Ajout planning type Général
        $planning_type1 = new PlanningType();
        $planning_type1->setName('Général');
        // On persiste l'admin
        $manager->persist($planning_type1);

        //Ajout planning type Disponibilité
        $planning_type2 = new PlanningType();
        $planning_type2->setName('Disponibilité');
        // On persiste l'admin
        $manager->persist($planning_type2);

        $manager->flush();
    }
}
