<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CalendarRepository;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PlanningFormerController extends AbstractController
{
    /**
     * @var SubjectRepository
     */
    private $repository;

    private $user;

    public function __construct(SubjectRepository $Reposit, TokenStorageInterface $tokenStorage)
    {
        $this->repository = $Reposit;
        $this->user = $tokenStorage->getToken()->getUser();
    }

    /**
     * @Route("/planning/former", name="planning_former")
     */
    public function Agenda(Request $request, CalendarRepository $calendar)
    {
        $events = $calendar->findAll();
        $rdvs = [];
        foreach ($events as $event) {
            if ($event->getPlanningType()->getId() == 2 && $event->getUser() == $this->user) {
                $rdvs[] = [
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
        }
        $data = json_encode($rdvs);

        $User = new User();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $em = $this->getDoctrine()->getManager();
        $User = $repository->findAll();
        $em->flush();

        return $this->render('planning_former/index.html.twig', compact('data','User'));
    }
}
