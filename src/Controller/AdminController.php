<?php

namespace App\Controller;
 
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

/**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
         $user = $this->getDoctrine()
         ->getRepository(User::class)
         ->findAll();

        return $this->render('admin/index.html.twig', [
            'user' => $user ,
        ]);
    }

    /**
     * @Route("/admin/user", name="admin_user")
     */
     public function index1()
     {
          $user = $this->getDoctrine()
          ->getRepository(User::class)
          ->findAll();
 
         return $this->render('admin/index.html.twig', [
             'user' => $user ,
         ]);
     }
 
 
       
 
       /**
      * @Route("/admin/user/new", name="admin_user_new")
      */
     public function new(Request $request,ObjectManager $em):Response
     {
         $user = new user;
         $form= $this->createForm(UserType::class, $user);
         $form->handleRequest($request);
 
         if($form->isSubmitted() && $form->isValid())
         {
             $em->persist($user);
             $em->flush(); 
             $this->addFlash('success', ' Created ! ');

             return $this->redirectToRoute('admin');
         }
 
      return $this->render('admin/create_form.html.twig',
      ['form' => $form->createView(),
         ]);
     } 
/**
     * Permet de supprimer 
     * 
     * @Route("/admin/user/{id}/delete", name="admin_user_delete")
     *
     * @return Response
     */
     public function delete(User $user, ObjectManager $manager) {
        $manager->remove($user);
        $manager->flush();

        $this->addFlash(
            'success',
            " utlisateur a bien été supprimée"
        );

        return $this->redirectToRoute("admin");
    }
     
}
