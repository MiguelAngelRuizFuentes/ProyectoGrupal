<?php

namespace App\Controller;

use App\Entity\MeInteresa;
use App\Form\MeInteresaType;
use App\Repository\MeInteresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meinteresa")
 */
class MeInteresaController extends AbstractController
{
    /**
     * @Route("/", name="me_interesa_index", methods={"GET"})
     */
    public function index(MeInteresaRepository $meInteresaRepository): Response
    {
        return $this->render('me_interesa/index.html.twig', [
            'me_interesas' => $meInteresaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="me_interesa_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $meInteresa = new MeInteresa();
        $form = $this->createForm(MeInteresaType::class, $meInteresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meInteresa);
            $entityManager->flush();

            return $this->redirectToRoute('me_interesa_index');
        }

        return $this->render('me_interesa/new.html.twig', [
            'me_interesa' => $meInteresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="me_interesa_show", methods={"GET"})
     */
    public function show(MeInteresa $meInteresa): Response
    {
        return $this->render('me_interesa/show.html.twig', [
            'me_interesa' => $meInteresa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="me_interesa_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MeInteresa $meInteresa): Response
    {
        $form = $this->createForm(MeInteresaType::class, $meInteresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('me_interesa_index');
        }

        return $this->render('me_interesa/edit.html.twig', [
            'me_interesa' => $meInteresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="me_interesa_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MeInteresa $meInteresa): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meInteresa->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($meInteresa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('me_interesa_index');
    }
}
