<?php

namespace App\Controller;

use App\Entity\Noticia;
use App\Form\NoticiaType;
use App\Repository\NoticiaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * @Route("/noticia")
 */
class NoticiaController extends AbstractController
{
    /**
     * @Route("/", name="noticia_index", methods={"GET"})
     */
    public function index(NoticiaRepository $noticiaRepository): Response
    {
        return $this->render('noticia/index.html.twig', [
            'noticias' => $noticiaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="noticia_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $noticium = new Noticia();
        $fecha = new \DateTime();
        $form = $this->createForm(NoticiaType::class, $noticium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $brochureFile = $form->get('imagenDestacada')->getData();


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
                $noticium->setImagenDestacada($newFilename);
            }



            $entityManager = $this->getDoctrine()->getManager();
            $noticium->setAutorNoticia($this->getUser());
            $noticium->setFechaPublicacion($fecha);
            $entityManager->persist($noticium);
            $entityManager->flush();

            return $this->redirectToRoute('verNoticias');
        }

        return $this->render('noticia/new.html.twig', [
            'noticium' => $noticium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="noticia_show", methods={"GET"})
     */
    public function show(Noticia $noticium): Response
    {
        return $this->render('noticia/show.html.twig', [
            'noticium' => $noticium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="noticia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Noticia $noticium): Response
    {
        $form = $this->createForm(NoticiaType::class, $noticium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('noticia_index');
        }

        return $this->render('noticia/edit.html.twig', [
            'noticium' => $noticium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="noticia_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Noticia $noticium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$noticium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($noticium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('noticia_index');
    }
}
