<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Entity\User;
use App\Form\CreateTaskType;
use Symfony\Component\Validator\Validation;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Security\Core\User\UserInterface;


class TaskController extends AbstractController
{
 
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $task_repo = $this->getDoctrine()->getRepository(Task::class);
        $tasks = $task_repo->findBy([],['id'=>'DESC']);
//        
//        foreach($tasks as $task){
//            
//             //echo $task->getUser()->getEmail()." ".$task.getTitle()."</br>";
//            echo $task->getUser()->getEmail().' '.$task->getTitle()."</br>";
//        }
//        
//        $user_repo = $this->getDoctrine()->getRepository(User::class);
//        
//        $users = $user_repo->findAll();
//        
//        Echo "<hr>";
//                
//        foreach($users as $user){
//            
//            echo "Usuario->".$user->getName()."</br>";
//            foreach ($user->getTasks()  as $task){
//                
//                echo $task->getTitle()."</br> ";
//                
//            }
//            
//        }
        
        
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks
        ]);
    }
    
        public function myTasks(UserInterface $user) {
            
//        $em = $this->getDoctrine()->getManager();
//        $task_repo = $this->getDoctrine()->getRepository(Task::class);
//        $tasks = $task_repo->findBy(["user_id" => $user->getId()],['id'=>'DESC']);

        $tasks = $user->getTasks();
        
        return $this->render('task/mytasks.html.twig', [
            'tasks' => $tasks
        ]);
    }
    
    
    
    public function detail(Task $task){
        
        if (!$task) {
            
            return $this->redirectToRoute("tasks");
            
        }
        
        return $this->render("task/detail.html.twig", [
            "task" => $task
        ]);
        
    }
    
    //Para recibir como parametro el usuario de la session
    //public function create(Request $request, Symfony\Component\Security\Core\User\UserInterface $user){
    
    public function create(Request $request){

        $task = new task();
        
        $form = $this->createForm(CreateTaskType::class,$task);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $task->setUser($this->get('security.token_storage')->getToken()->getUser());
            $task->setCreatedAt(new \Datetime('now'));
            $em =  $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('message','Se creo la tarea satisfactoriamente');
            //return $this->redirect("create");
            
            return $this->redirect($this->generateUrl( "task_detail" , ["id" => $task->getId()] ));
            
        }
        
        return $this->render("task/create.html.twig",[
            "form" => $form->createView()   
        ]);
        
        
    }
    
    public function edit(Request $request,Task $task,UserInterface $user){
        
        if (!$user || $task->getUser()->getId() != $user->getId()){
            
            return $this->redirectToRoute("tasks");
            
        }

        $form = $this->createForm(CreateTaskType::class,$task);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            //$task->setUser($this->get('security.token_storage')->getToken()->getUser());
            //$task->setCreatedAt(new \Datetime('now'));
            $em =  $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('message','Se actualizó la tarea satisfactoriamente');
            //return $this->redirect("create");
            
            return $this->redirect($this->generateUrl( "task_detail" , ["id" => $task->getId()] ));
            
        }
        
        return $this->render("task/create.html.twig",[
            "form" => $form->createView(),
            "edit" => true   
        ]);
        
        
    }
    
     public function delete(Task $task,UserInterface $user){
        
        if (!$user || !$task || $task->getUser()->getId() != $user->getId()){
            
            return $this->redirectToRoute("tasks");
            
        }
        
            $em =  $this->getDoctrine()->getManager();
            $em->remove($task);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('message','Se eliminó la tarea satisfactoriamente');

        return $this->redirectToRoute("tasks");
        
        
    }
    
}
