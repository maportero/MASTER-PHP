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
        for($i=1;$i<=10;$i++){
            
           echo "<h4>Tabla de Multiplicar $i</h4></br>";
           
           echo "<table border=1>";
           echo "<tr>";
            echo "<th>Operacion</th>";
           echo "<th>Resultado</th>";
           echo "</tr>";
           for ($j=1;$j<=10;$j++){
                echo "<tr>";
                echo "<td>$i x $j</td>";
                echo "<td>".($i*$j)."</td>";
                echo "</tr>";               
           }
           echo "</table></br></br>";  
        }
        ?>
    </body>
</html>
