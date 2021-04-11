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
        // Creation d'admin
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



        // Creation des secretaire
        $admin = new User();
        $admin->setEmail('sercretaire1@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'sercretaire1'
            ))
            ->setLastname('sercretaire1')
            ->setFirstname('sercretaire1')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_SECRETAIRE']);
        // On persiste l'sercretaire
        $manager->persist($admin);

        $admin = new User();
        $admin->setEmail('sercretaire2@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'sercretaire2'
            ))
            ->setLastname('sercretaire2')
            ->setFirstname('sercretaire2')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_SECRETAIRE']);
        // On persiste l'sercretaire
        $manager->persist($admin);
// Creation de formateurs
        $admin = new User();
        $admin->setEmail('formateur1@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'formateur1'
            ))
            ->setLastname('formateur1')
            ->setFirstname('f1')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_FORMATEUR']);
        // On persiste l'admin
        $manager->persist($admin);

        $admin = new User();
        $admin->setEmail('formateur2@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'formateur2'
            ))
            ->setLastname('formateur2')
            ->setFirstname('f2')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_FORMATEUR']);
        // On persiste le formateur
        $manager->persist($admin);

        $admin = new User();
        $admin->setEmail('formateur3@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'formateur3'
            ))
            ->setLastname('formateur3')
            ->setFirstname('f3')
            ->setPhoneNumber('+33612345678')
            ->setRoles(['ROLE_FORMATEUR']);
        // On persiste le formateur
        $manager->persist($admin);

        $admin = new User();
        $admin->setEmail('user@websymfony.fr')
            ->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'user'
            ))
            ->setLastname('user')
            ->setFirstname('user')
            ->setPhoneNumber('+33612345678');
        // On persiste le formateur
        $manager->persist($admin);

        //Ajout matière
        $subject = new Subject();
        $subject->setName('Java')
            ->setTTHour(100);
        // On persiste la matiere
        $manager->persist($subject);

        $subject = new Subject();
        $subject->setName('Microsoft')
            ->setTTHour(100);
        // On persiste la matiere
        $manager->persist($subject);

        $subject = new Subject();
        $subject->setName('Anglais')
            ->setTTHour(100);
        // On persiste la matiere
        $manager->persist($subject);

        $subject = new Subject();
        $subject->setName('Virtualisation')
            ->setTTHour(100);
        // On persiste la matiere
        $manager->persist($subject);

        $subject = new Subject();
        $subject->setName('CCNA')
            ->setTTHour(100);
        // On persiste la matiere
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
