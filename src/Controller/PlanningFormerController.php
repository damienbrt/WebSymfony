<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningFormerController extends AbstractController
{
    /**
     * @Route("/planning/former", name="planning_former")
     */
    public function index(): Response
    {
        return $this->render('planning_former/index.html.twig', [
            'controller_name' => 'PlanningFormerController',
        ]);
    }
}
