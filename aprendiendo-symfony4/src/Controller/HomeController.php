<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/home", name="home")
     */
    public function index() {
        return $this->render('home/index.html.twig', [
                    'controller_name' => 'HomeController',
                    'hello' => 'Bienvenido a symfony 4!!!!'
        ]);
    }

    public function animales($nombre, $apellido) {
        $title = "Bienvenido a la pagina de animales";
        $animales = array('perro', 'gato', 'loro', 'pajaro');
        $aves = array(
            'tipo' => 'aguila',
            'raza' => 'americana',
            'anios' => 4,
            'habitad' => 'America');

        return $this->render('home/animales.html.twig', [
                    'title' => $title,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'animales' => $animales,
                    'aves' => $aves
        ]);
    }

    public function redirigir() {
//        
//        return $this->redirectToRoute('animales',[
//            'nombre' => 'Felipe',
//            'apellido' => '004'
//            
//        ]);

        return $this->redirect('http://www.rumipamba.edu.ec');
    }

}
