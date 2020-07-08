<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class UserController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder){

    
        $user = new User();
        
        $form = $this->createForm(RegisterType::class,$user);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $user->setRole('ROLE_USER');
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $user->setCreatedAt(new \DateTime('now'));
            $em =  $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('message','Se creo el usuario');
            return $this->redirectToRoute('tasks');
            
        }
        
        return $this->render("user/register.html.twig",[
            "form" => $form->createView()
        ]);
    }
    
    public function login(AuthenticationUtils $authU){
        
        $error = $authU->getLastAuthenticationError();
        
        $lastUsername = $authU->getLastUsername();
        
        return $this->render("user/login.html.twig",[
            'error' => $error,
            'last_username' => $lastUsername
        ]);
        
    }
}
