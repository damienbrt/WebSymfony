<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\CalendarRepository;
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
    public function Agenda(Request $request, CalendarRepository $calendar)
    {
        $events = $calendar->findAll();
        $rdvs = [];
        foreach ($events as $event){
            $rdvs[]= [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
            ];
        }
        $data = json_encode($rdvs);
        /* Creation d'une matière dans la BDD
        $subject = new Subject();
        $subject->setName("MatièreTest")
            ->setTTHour(10);
        $this->em = $this->getDoctrine()->getManager();
        $this->em->persist($subject);
        $this->em->flush();
        dump($subject);*/

        //$subject = $this->repository->findAll();
        //$subject = $this->repository->findOneBy(['TT_hour' => 123]);
        //$subject = $this->repository->findAllByHour();
//, ['subjects' => $subject]
        return $this->render('Agenda/Agenda.html.twig',compact('data'));
    }
}