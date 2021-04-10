<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserCrudController extends AbstractCrudController
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * Class Constructor
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    // la méthode pour personnaliser les champs à afficher
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname', 'Nom'),
            TextField::new('lastname', 'Prénom'),
            TextField::new('email', 'Email'),
            TextField::new('password', 'Mot de passe')->setFormType(PasswordType::class)->onlyOnForms(),
            TextField::new('phoneNumber', 'Numéro de téléphone'),
            ChoiceField::new('roles')->setChoices(['Admin' => 'ROLE_ADMIN', 'Formateur' => 'ROLE_FORMATEUR', 'Secrétaire'=>'ROLE_SECRETAIRE'])->allowMultipleChoices()->setRequired(0)
        ];
    }

    // Je redéfinie la méthode persist de 'AbstractCrudController'
    public function persistEntity(EntityManagerInterface $em, $user): void
    {
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodedPassword);

        parent::persistEntity($em, $user);
    }

    // Je redéfinie la méthode update de 'AbstractCrudController'
    public function updateEntity(EntityManagerInterface $em, $user): void
    {
        if ($user->getPassword() != null) {
            $encodedPassword = $this->passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);
        }

        parent::updateEntity($em, $user);
    }
}
