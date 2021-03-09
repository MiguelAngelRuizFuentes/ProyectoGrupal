<?php

namespace App\Controller;

use App\Entity\Ventaja;
use App\Form\VentajaType;
use App\Repository\VentajaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/ventaja")
 */
class VentajaController extends AbstractController
{
    /**
     * @Route("/", name="ventaja_index", methods={"GET"})
     */
    public function index(VentajaRepository $ventajaRepository): Response
    {
        return $this->render('ventaja/index.html.twig', [
            'ventajas' => $ventajaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ventaja_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $ventaja = new Ventaja();
        $form = $this->createForm(VentajaType::class, $ventaja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $brochureFile = $form->get('imagen')->getData();


            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        "img",
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $ventaja->setImagen($newFilename);
            }



            $entityManager = $this->getDoctrine()->getManager();
            $ventaja->setAutor($this->getUser());
            $entityManager->persist($ventaja);
            $entityManager->flush();

            return $this->redirectToRoute('verVentajas');
        }

        return $this->render('ventaja/new.html.twig', [
            'ventaja' => $ventaja,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ventaja_show", methods={"GET"})
     */
    public function show(Ventaja $ventaja): Response
    {
        return $this->render('ventaja/show.html.twig', [
            'ventaja' => $ventaja,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ventaja_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ventaja $ventaja): Response
    {
        $form = $this->createForm(VentajaType::class, $ventaja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ventaja_index');
        }

        return $this->render('ventaja/edit.html.twig', [
            'ventaja' => $ventaja,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ventaja_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ventaja $ventaja): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ventaja->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ventaja);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ventaja_index');
    }
}
