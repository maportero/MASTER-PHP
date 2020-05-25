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
        $texto='';
        if (isset($_GET['texto']) ){
            $texto=$_GET['texto'];
            if (is_null($texto) || empty($texto) ){
                $texto= strtoupper('texto  en minuscula');
            }
        }
        
        echo $texto;
        ?>
    </body>
</html>
