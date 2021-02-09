<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AgendaController extends AbstractController
{
    /**
     * @Route("/Agenda", name="Agenda")
     */
    public function Agenda(Request $request)
    {
        return $this->render('Agenda/Agenda.html.twig');
    }
}