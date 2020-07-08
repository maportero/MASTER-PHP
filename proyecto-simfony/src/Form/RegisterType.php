<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

// Clase para crear formulario

class RegisterType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("name",TextType::class,[
                    "label" => "Nombre" ])
                ->add("surname",TextType::class,[
                    "label" => "Apellido" ])
                ->add("email",EmailType::class,[
                    "label" => "Correo Electronico" ])
                ->add("password",PasswordType::class,[
                    "label" => "Contraseña" ])
                ->add("submit",SubmitType::class,[
                    "label" => "Crear Usuario",
                    "attr" => ["class" => "btn btn-success"]
                ]);
    }
    
}
