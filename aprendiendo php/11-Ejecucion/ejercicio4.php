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
        <?php
        // put your code here
        
        if (isset($_GET['numero1']) && isset($_GET['numero2'])){
            $numero1=$_GET['numero1'];
            $numero2=$_GET['numero2'];
            echo "Las operaciones basicas con $numero1 y $numero2 son: </br>";
            echo "Suma: ".($numero1+$numero2)."</br>";
            echo "Resta: ".($numero1-$numero2)."</br>";
            echo "Multiplicacion: ".($numero1*$numero2)."</br>";
            echo "Division: ".($numero1/$numero2)."</br>";
        }else{
         echo "No hay Valores. Intentar nuevamente";   
        }
        ?>
    </body>
</html>
