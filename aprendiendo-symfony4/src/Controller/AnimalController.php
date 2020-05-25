<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Form\AnimalType;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;


use App\Entity\Animal;
class AnimalController extends AbstractController
{
    
    public function validarEmail($email){
        $validator = Validation::createValidator();
        $errores = $validator->validate($email,[
            new Email()
        ]);
        
        if (count($errores) > 0){
            
            foreach ($errores as $error){
                echo $error->getMessage().'</br>';
            }
            
        }else{
            echo 'sin errores'; 
        }
        die();    
    }


    public function crearAnimal(Request $request){
        
        $animal = new Animal();
        
        $form = $this->createForm(AnimalType::class,$animal);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em =  $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('message','Se creo el animal');
            return $this->redirect("crear-animal");
            
        }
        
        return $this->render("animal/crear-animal.html.twig",[
            "form" => $form->createView()
        ]);
        
    }

    public function index()
    {
        
       $animal_repo = $this->getDoctrine()->getRepository(Animal::class);
       
       $animales = $animal_repo->findAll();
       
       $animales2 = $animal_repo->findBy([
           "raza" => "Calva"
           
       ],[
           "id" => "desc"
       ]);
       
       //var_dump($animales2);
       
       // QUERY BUILDER
       
       $qb = $animal_repo->createQueryBuilder("a")
                         //->andWhere("a.raza = :raza" )
                         //->setParameter("raza","Pastor Aleman")
                         ->orderBy("a.raza","desc")
                         ->getQuery();
       
       $resulset = $qb->execute();
       
       //var_dump($resulset);
       
       //DQL
       
       $em = $this->getDoctrine()->getManager();
       $dql ="SELECT a FROM App\Entity\Animal a WHERE a.raza = 'Calva'";
       $query = $em->createQuery($dql);
       
       $resulset3 = $query->execute(); 
       
       //var_dump($resulset3);
       
       //SQL
       
       $conn =  $this->getDoctrine()->getConnection();
       $sql = "select * from animal";
       $prepare =  $conn->prepare($sql);
       $prepare->execute();
       $resulset4 = $prepare->fetchAll();
       
       //var_dump($resulset4);
       
       //funcion creada en repositorio
       
       $result4 = $animal_repo->findAllAnimals("raza");
       
       var_dump($result4);
       
       
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animales' => $animales
        ]);
    }
    
    public function save(){
        
        
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $animal = new Animal();
        $animal->setTipo($this->response("tipo"));
        $animal->setColor('Negra');
        $animal->setRaza('Calva');
        
        $entityManager->persist($animal);
        
        $entityManager->flush();
        
        return new Response('El animal ha sido guardado Id->'.$animal->getId());
    }
    
    public function animal(Animal $animal){
       
//       $animal_repo = $this->getDoctrine()->getRepository(Animal::class);
//       
//       $animal = $animal_repo->find($id);
       
       if (!$animal){
           $message = "El animal no existe";
       }
        else {
           $message =  'El animal buscado es de raza '.$animal->getRaza();
        }
        
      return new Response($message);
    }
    
    public function update($id){
        
       $doctrine = $this->getDoctrine();
       
       $em = $doctrine->getManager();
       
       $animal_repo = $doctrine->getRepository(Animal::class);
       
       $animal = $animal_repo->find($id);
       
       if (!$animal){
           $message = "El animal no existe";
       }
        else {
            
           $animal->setTipo('Perro');
           $animal->setColor('Marron');
           $animal->setRaza('Pastor Aleman');
           
           $em->persist($animal);
           
           $em->flush();       
            
           $message =  'El animal se ha guardado '.$animal->getRaza();
        }
        
      return new Response($message);
 
    }
    
    public function delete(Animal $animal){
        $em = $this->getDoctrine()->getManager();
        
        if ($animal && is_object($animal)){
            
            $em->remove($animal);
            $em->flush();
            $message= "Elemento borrado ";
            
        }else {
            
            $message= "NO existe el elemento";
            
        }
        
        return new Response($message);
    }
}
