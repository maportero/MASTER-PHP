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
        
        $elementos = array(2,3,8,7,6,1,4,5);
        
        echo '<h1>Recorriendo elementos</h1></br>';
        foreach ($elementos as $elemento){
            echo $elemento.'</br>';
            
        }
        
        echo '<h1>Elementos Ordenados</h1></br>';
        
        sort($elementos);
        
       foreach ($elementos as $elemento){
            echo $elemento.'</br>';
            
        }
        
        echo '<h1>Longitud de elementos</h1></br>';
        
        echo sizeof($elementos);
        
        echo '<h1>Buscando elemnto 8</h1></br>';
        echo $busqueda= array_search(3, $elementos);
        
        ?>
    </body>
</html>
