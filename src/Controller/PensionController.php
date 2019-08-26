<?php

namespace App\Controller;

use App\Entity\Pension;
use App\Form\PensionType;
use App\Repository\PensionRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PensionController extends AbstractController
{




     /**
     * @Route("/pension", name="pension.view")
     */
     public function view ()
     { 
        $pension = $this->getDoctrine()
        ->getRepository(Pension::class)
        ->findAll();        
         return $this->render('admin_pension/pensionshow.html.twig', compact('pension'));
     }



    /**
     * @param Request $request
     *
     * return Response
     *
     * @Route("/pension/add", name="pension_add")
     */
     
      public function new (Request $request, ObjectManager $em)
      { 
          $pension = new Pension;
          $form = $this-> createForm(PensionType::class, $pension);
          $form->handleRequest($request);
 
 
          if ($form ->isSubmitted() && $form->isValid())
          {
              $em = $this->getDoctrine()->getManager();
               $em->persist($pension);
               $em->flush();
               return $this->redirectToRoute('pension.view');
               $this->addFlash('success', ' Created ! ');

           }
    
          $formView = $form->createView();

          return $this->render('admin_pension/pensionAdd.html.twig',[
            'form' =>$form->createView()
            
            

        ]);
  
      }
}
