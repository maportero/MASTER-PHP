<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="ejercicio3.php" method="POST"> 
            <label for="numero1" >Numero 1</label>
            <input type="number" name="numero1"  > </br>
            <label for="numero2" >Numero 2</label>
            <input type="number"  name="numero2"  ></br>
            <input type=submit name="Operacion" value="Sumar">
            <input type=submit name="Operacion" value="Restar">  
            <input type=submit name="Operacion" value="Multiplicar">  
            <input type=submit name="Operacion" value="Dividir">  
        </form>
        <?php
         if (!empty($_POST['numero1']) && !empty($_POST['numero2'])){
            
             $resultado=0;
             switch ($_POST['Operacion']){
                case 'Sumar':{
                     $resultado = $_POST['numero1'] +  $_POST['numero2'];
                     break;
                 }
                case 'Restar':{
                     $resultado = $_POST['numero1'] - $_POST['numero2'];
                     break;
                 }
                case 'Multiplicar':{
                     $resultado = $_POST['numero1'] * $_POST['numero2'];
                     break;
                 }
                case 'Dividir':{
                     $resultado = $_POST['numero1'] / $_POST['numero2'];
                     break;
                 }
             }
             
             echo 'El resultado es: '.$resultado;
             
         }else{
             echo 'Debe ingresar valores válidos';
         }
         
        ?>
    </body>
</html>
