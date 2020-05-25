<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (!isset($_SESSION['numero'])){
    $_SESSION['numero']=0;
}
if(isset($_GET['contador']) && $_GET['contador'] == 0 ){
    $_SESSION['numero']-=1;
}elseif (isset($_GET['contador']) && $_GET['contador'] == 1 ){
    $_SESSION['numero']+=1;
}
?>
<h1>Ejercicio 1 </h1>
<h3>Valor del contador es: <?= $_SESSION['numero'] ?></h3>
<a href="ejercicio1.php?contador=1"  >Aumentar contador</a></br>
<a href="ejercicio1.php?contador=0"  >Disminuir contador</a>