<?php

namespace App\Controller;

use App\Entity\ListaCorreo;
use App\Form\ListaCorreoType;
use App\Repository\ListaCorreoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/listacorreo")
 */
class ListaCorreoController extends AbstractController
{
    /**
     * @Route("/", name="lista_correo_index", methods={"GET"})
     */
    public function index(ListaCorreoRepository $listaCorreoRepository): Response
    {
        return $this->render('lista_correo/index.html.twig', [
            'lista_correos' => $listaCorreoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lista_correo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $listaCorreo = new ListaCorreo();
        $form = $this->createForm(ListaCorreoType::class, $listaCorreo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listaCorreo);
            $entityManager->flush();

            return $this->redirectToRoute('lista_correo_index');
        }

        return $this->render('lista_correo/new.html.twig', [
            'lista_correo' => $listaCorreo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lista_correo_show", methods={"GET"})
     */
    public function show(ListaCorreo $listaCorreo): Response
    {
        return $this->render('lista_correo/show.html.twig', [
            'lista_correo' => $listaCorreo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lista_correo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ListaCorreo $listaCorreo): Response
    {
        $form = $this->createForm(ListaCorreoType::class, $listaCorreo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lista_correo_index');
        }

        return $this->render('lista_correo/edit.html.twig', [
            'lista_correo' => $listaCorreo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lista_correo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ListaCorreo $listaCorreo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listaCorreo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($listaCorreo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lista_correo_index');
    }
}
