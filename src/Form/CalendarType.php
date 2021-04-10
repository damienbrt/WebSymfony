<?php

namespace App\Form;

use App\Entity\Calendar;
use App\Entity\Subject;
use App\Entity\User;
use App\Entity\PlanningType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CalendarType extends AbstractType
{
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (in_array('ROLE_ADMIN', $this->user->getRoles()) || in_array('ROLE_SECRETAIRE', $this->user->getRoles())) {
            $builder
                ->add('title')
                ->add('start', DateTimeType::class, [
                    'date_widget' => 'single_text'
                ])
                ->add('end', DateTimeType::class, [
                    'date_widget' => 'single_text'
                ])
                ->add('description')
                ->add('background_color', ColorType::class)
                ->add('border_color', ColorType::class)
                ->add('text_color', ColorType::class)
                ->add('subject', EntityType::class, [
                    'class' => Subject::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.name', 'ASC');
                    },
                    'choice_label' => 'name',])
                ->add('user', EntityType::class, [
                    'class' => User::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.pseudo', 'ASC');
                    },
                    'choice_label' => 'pseudo',
                ])
                ->add('planningType', EntityType::class, [
                    'class' => PlanningType::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->orderBy('p.name', 'ASC');
                    },
                    'choice_label' => 'name',
                ]);

        } else {
            $builder
                ->add('title')
                ->add('start', DateTimeType::class, [
                    'date_widget' => 'single_text'
                ])
                ->add('end', DateTimeType::class, [
                    'date_widget' => 'single_text'
                ])
                ->add('description')
                ->add('background_color', ColorType::class)
                ->add('border_color', ColorType::class)
                ->add('text_color', ColorType::class)
                ->add('subject', EntityType::class, [
                    'class' => Subject::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.name', 'ASC');
                    },
                    'choice_label' => 'name',]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}
