<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AgendaController extends AbstractController
{
    /**
     * @var SubjectRepository
     */
    private $repository;

    public function __construct(SubjectRepository $Reposit)
    {
        $this->repository = $Reposit;
    }

    /**
     * @Route("/agenda", name="Agenda")
     */
    public function Agenda(Request $request)
    {
        /* Creation d'une matière dans la BDD
        $subject = new Subject();
        $subject->setName("MatièreTest")
            ->setTTHour(10);
        $this->em = $this->getDoctrine()->getManager();
        $this->em->persist($subject);
        $this->em->flush();
        dump($subject);*/

        $subject = $this->repository->findAll();
        //$subject = $this->repository->findOneBy(['TT_hour' => 123]);
        //$subject = $this->repository->findAllByHour();

        return $this->render('Agenda/Agenda.html.twig', ['subjects' => $subject]);
    }
}