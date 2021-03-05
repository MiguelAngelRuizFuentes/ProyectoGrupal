<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/datosPerfil", name="datosPerfil")
     * @IsGranted("ROLE_USER")
     */
    public function datosPerfil(): Response
    {
        return $this->render('main/perfil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
