<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
// Clase para crear formulario

class CreateTaskType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("title",TextType::class,[
                    "label" => "Título" ])
                ->add("content",TextareaType::class,[
                    "label" => "Descripción" ])
                ->add("priority",ChoiceType::class,[
                    "label" => "Prioridad", 
                    "choices" => ["High"=>"high","Medium"=>"medium","Low"=>"low"]
                    ])
                ->add("hours",IntegerType::class,[
                    "label" => "Horas" ])
                ->add("submit",SubmitType::class,[
                    "label" => "Guardar",
                    "attr" => ["class" => "btn btn-success"]
                ]);
    }
    
}
