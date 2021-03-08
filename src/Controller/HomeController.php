<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @var SubjectRepository
     */
    private $repository;

    /**
     * @var em
     */
    private $em;

    public function __construct()
    {
    }

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        //Creation d'un user dans la BDD
        $User = new User();

        $this->repository = $this->getDoctrine()->getRepository(User::class);
        $this->em = $this->getDoctrine()->getManager();

        /*
        $this->em->persist($User);
        $this->em->flush();
        dump($User);*/

        //$User = $this->repository->findOneBy(['TT_hour' => 123]);
        $User = $this->repository->findAll();
        $this->em->flush();

        //return $this->render('home/index.html.twig');
        return $this->render('home/index.html.twig', ['user' => $User]);
    }
}
