<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     * @Route("/admin/user", name="admin_user")
     */
    public function index()
    {
         $user = $this->getDoctrine()
         ->getRepository(User::class)
         ->findAll();

        return $this->render('admin/user/index.html.twig', [
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
            return $this->redirectToRoute('admin_user');
        }

     return $this->render('admin/create_form.html.twig',
     ['form' => $form->createView(),
        ]);
    } 

 


}
