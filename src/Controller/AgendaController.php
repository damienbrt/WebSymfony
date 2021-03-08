<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AgendaController extends AbstractController
{

    /**
     * @Route("/agenda", name="Agenda")
     * @return Response
     */
    public function Agenda() : Response
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
        return $this->render('Agenda/Agenda.html.twig',compact('data'));
    }
}