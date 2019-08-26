<?php

namespace App\Controller;
use App\Entity\Hotel;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Controller\HotelController;
use App\Repository\HotelRepository;
use App\Controller\PropertyController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelController extends AbstractController
{
   
    
      
    /**
    *@Route("/hotel/{slug}-{id}", name="hotel.show", requirements={"slug": "[a-z0-9\-]*"})
      */
    public function show(Hotel $hotel, string $slug,Request $request, ObjectManager $manager)
    { 
        $reserver = new Reservation();


          $form = $this-> createForm(ReservationType::class, $reserver);
         $form->handleRequest($request);
 

           return $this->render('site/front/show.html.twig',[
              'hotel' => $hotel,
              'form' => $form->createView()

          ]);
    }
  

    /**
    *@Route("/contact", name="contact.index")
    */
    public function contact (Request $request ,ObjectManager $em)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form ->isSubmitted() && $form->isValid())
        {
              $em->persist($contact);
              $em->flush();
              $this->addFlash('success', ' Created ! ');


                  
        }

           return $this->render('site/front/contact.html.twig',[
              'form' =>$form->createView()
              
              

          ]);
    }
}
 