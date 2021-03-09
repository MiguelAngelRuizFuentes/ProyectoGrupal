<?php

namespace App\Controller;

use App\Entity\Mision;
use App\Form\MisionType;
use App\Repository\MisionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/mision")
 */
class MisionController extends AbstractController
{
    /**
     * @Route("/", name="mision_index", methods={"GET"})
     */
    public function index(MisionRepository $misionRepository): Response
    {
        return $this->render('mision/index.html.twig', [
            'misions' => $misionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mision_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $mision = new Mision();
        $form = $this->createForm(MisionType::class, $mision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $mision->setCompletada(false);
            $mision->setAutor($this->getUser());
            $entityManager->persist($mision);
            $entityManager->flush();

            return $this->redirectToRoute('verMisiones');
        }

        return $this->render('mision/new.html.twig', [
            'mision' => $mision,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mision_show", methods={"GET"})
     */
    public function show(Mision $mision): Response
    {
        return $this->render('mision/show.html.twig', [
            'mision' => $mision,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mision_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mision $mision): Response
    {
        $form = $this->createForm(MisionType::class, $mision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mision_index');
        }

        return $this->render('mision/edit.html.twig', [
            'mision' => $mision,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mision_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mision $mision): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mision->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mision);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mision_index');
    }
}
