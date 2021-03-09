<?php

namespace App\Controller;

use App\Entity\Ventaja;
use App\Entity\Mision;
use App\Entity\Evento;
use App\Entity\Noticia;
use App\Entity\User;
use App\Form\DniVerificadorType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

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
     * @Route("/perfil", name="perfil")
     * @IsGranted("ROLE_USER")
     */
    public function perfil(): Response
    {
        return $this->render('main/perfil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/verificarDniAdmin", name="verificarDniAdmin")
     */
    public function verificarDniAdmin(Request $request, SluggerInterface $slugger): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(DniVerificadorType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            // Modificar fotoDni
            /** @var UploadedFile $fotoDni */
            $fotoDni = $form->get('fotoDni')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($fotoDni) {
                $originalFilename = pathinfo($fotoDni->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$fotoDni->guessExtension();

                // Move the file to the directory where fotoDni are stored
                try {
                    $fotoDni->move(
                        'fotosDniVerificar/',
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw $e;
                }

                // updates the 'fotoDni' property to store the PDF file name
                // instead of its contents
                $user->setFotoDni($newFilename);
            }

            // ... persist the $user variable or any other work
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }
        return $this->render('main/dniVerficado.html.twig', [
            'dniVerificador' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verificarDniAdminFoto", name="verificarDniAdminFoto")
     * @IsGranted("ROLE_ADMIN")
     */
    public function verificarDniAdminFoto(): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('main/verificarDniAdminFoto.html.twig', [
            'controller_name' => 'MainController',
            'users' => $users
        ]);
    }

    /**
     * @Route("/verificarFotoDni", name="verificarFotoDni")
     * @IsGranted("ROLE_ADMIN")
     */
    public function verificarFotoDni(Request $request): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($request->query->get('id_user'));
        $entityManager = $this->getDoctrine()->getManager();
        $verificado = 'verificar';

        $user->setVerificado("1");

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response($verificado);
    }

    /**
     * @Route("/verVentajas", name="verVentajas")
     */
    public function verVentajas(): Response
    {
        $ventajas = $this->getDoctrine()->getRepository(Ventaja::class)->findAll();
        return $this->render('main/ventajas.html.twig', [
            'controller_name' => 'MainController',
            'ventajas' => $ventajas
        ]);
    }

    /**
     * @Route("/verEventos", name="verEventos")
     */
    public function verEventos(): Response
    {
        $eventos = $this->getDoctrine()->getRepository(Evento::class)->findAll();
        return $this->render('main/eventos.html.twig', [
            'controller_name' => 'MainController',
            'eventos' => $eventos
        ]);
    }

    /**
     * @Route("/verificarNew", name="verificarNew")
     */
    public function verificarNew(Request $request): Response
    {
        $evento = $this->getDoctrine()->getRepository(Evento::class)->find($request->query->get('id_evento'));
        $entityManager = $this->getDoctrine()->getManager();
        $verificarEvento = 1;

        $evento->setValidado(true);

        $entityManager->persist($evento);
        $entityManager->flush();

        return new Response($verificarEvento);
    }

    /**
     * @Route("/changename", name="changename", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function changeName(Request $request)
    { 
        $instance = $request->query->get('newName');
      
        if ( !$instance)
            return new Response("Error");

        //modificamos los datos que queramos de la $instance y la guardamos
        $this->getUser()->setNombre($instance);

        $em = $this->getDoctrine()->getManager();
        //$em->persist($instance);
        $em->flush();

            
        return new Response($this->getUser()->getNombre());
    }

    /**
     * @Route("/changeapellido1", name="changeapellido1", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function changeApellido1(Request $request)
    { 
        $instance = $request->query->get('newApellido1');
      
        if ( !$instance)
            return new Response("Error");

        //modificamos los datos que queramos de la $instance y la guardamos
        $this->getUser()->setApellido1($instance);

        $em = $this->getDoctrine()->getManager();
        //$em->persist($instance);
        $em->flush();

              
        return new Response($this->getUser()->getApellido1());
    }

    /**
     * @Route("/changeapellido2", name="changeapellido2", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function changeApellido2(Request $request)
    { 
        $instance = $request->query->get('newApellido2');
      
        if ( !$instance)
            return new Response("Error");

        //modificamos los datos que queramos de la $instance y la guardamos
        $this->getUser()->setApellido2($instance);

        $em = $this->getDoctrine()->getManager();
        //$em->persist($instance);
        $em->flush();

              
        return new Response($this->getUser()->getApellido2());
    }

    /**
     * @Route("/changedni", name="changedni", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function changeDni(Request $request)
    { 
        $instance = $request->query->get('newDni');
      
        if ( !$instance)
            return new Response("Error");

        //modificamos los datos que queramos de la $instance y la guardamos
        $this->getUser()->setDni($instance);

        $em = $this->getDoctrine()->getManager();
        //$em->persist($instance);
        $em->flush();

              
        return new Response($this->getUser()->getDni());
    }

    /**
     * @Route("/changefechanacimiento", name="changefechanacimiento", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function changeFechaNacimiento(Request $request)
    { 
        $date = $request->query->get('newFechaNacimiento');
      
        if ( !$instance)
            return new Response("Error");

        //modificamos los datos que queramos de la $instance y la guardamos
        $this->getUser()->setFechaNacimiento($date);

        $em = $this->getDoctrine()->getManager();
        $em->persist($instance);
        $em->flush();

              
        return new Response($this->getUser()->getFechaNacimiento()->format('Y-m-d'));
    }

}