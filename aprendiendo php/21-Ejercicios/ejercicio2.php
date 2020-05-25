<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validar_email($email){
    if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
    else return false;
    
}

if( isset($_GET['email'])){
    
    if (validar_email($_GET['email'])){
        echo '<h1>Email correcto: '.$_GET['email'].'/<h1>';
    } else {
        echo '<h1>Email incorrecto: '.$_GET['email'].'</h1>';
    }
}else {
    
    echo '<h1>Ingrese Email por GET</h1>';
}