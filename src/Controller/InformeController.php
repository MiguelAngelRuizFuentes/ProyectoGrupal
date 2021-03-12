<?php

namespace App\Controller;

use App\Entity\Mision;
use App\Entity\Informe;
use App\Form\Informe1Type;
use App\Repository\InformeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/informe")
 */
class InformeController extends AbstractController
{
    /**
     * @Route("/", name="informe_index", methods={"GET"})
     */
    public function index(InformeRepository $informeRepository): Response
    {
        $misiones = $this->getDoctrine()->getRepository(Mision::class)->findBy(array('usuario' => $this->getUser()));
        $puntos = 0;
        foreach($misiones as $mision ) {
            if($mision->getCompletada() == true) {
                $puntos += $mision->getPuntos();
            }
        }
        return $this->render('informe/index.html.twig', [
            'informes' => $informeRepository->findAll(),
            'puntos' => $puntos
        ]);
    }

    /**
     * @Route("/new", name="informe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $misiones = $this->getDoctrine()->getRepository(Mision::class)->findBy(array('usuario' => $this->getUser()));
        $puntos = 0;
        foreach($misiones as $mision ) {
            if($mision->getCompletada() == true) {
                $puntos += $mision->getPuntos();
            }
        }
        $informe = new Informe();
        $form = $this->createForm(Informe1Type::class, $informe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($informe);
            $entityManager->flush();

            return $this->redirectToRoute('informe_index');
        }

        return $this->render('informe/new.html.twig', [
            'informe' => $informe,
            'form' => $form->createView(),
            'puntos' => $puntos
        ]);
    }

    /**
     * @Route("/{id}", name="informe_show", methods={"GET"})
     */
    public function show(Informe $informe): Response
    {
        return $this->render('informe/show.html.twig', [
            'informe' => $informe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="informe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Informe $informe): Response
    {
        $form = $this->createForm(Informe1Type::class, $informe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('informe_index');
        }

        return $this->render('informe/edit.html.twig', [
            'informe' => $informe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="informe_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Informe $informe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$informe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($informe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('informe_index');
    }
}
