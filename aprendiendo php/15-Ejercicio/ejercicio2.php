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
        $elementos=array();
        
        for($i=0; $i<120 ; $i++){
            
            $elementos[]=$i;
            
        }
        
        echo '<h1>Elementos</h1></br>';
        
        foreach ($elementos as $elemento){
            
            echo $elemento.'</br>';
            
        }
        
        ?>
    </body>
</html>
