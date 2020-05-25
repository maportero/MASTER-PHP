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
                
        if (isset($_GET['numero1']) && isset($_GET['numero2'])){
            $numero1=$_GET['numero1'];
            $numero2=$_GET['numero2'];
            
            if ($numero2 > $numero1){
                echo "Los valores impares entre $numero1 y $numero2 son: </br>";
                for ($i=$numero1;$i<=$numero2;$i++){
                    
                    if (($i % 2)!=0){
                        echo "$i</br>";                  
                    }
                }
                
            }else {
                echo "El numero2 debe ser mayor al numero1 </br>";
            }

        }else{
         echo "No hay Valores. Intentar nuevamente";   
        }

        ?>
    </body>
</html>
