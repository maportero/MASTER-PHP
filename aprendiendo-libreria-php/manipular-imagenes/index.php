<?php

require_once '../vendor/autoload.php';

$fotoOriginal = "mifoto.jpg";
$guardarEn = "fotoModificada.jpg";

$thum = new PHPThumb\GD($fotoOriginal);

//$thum->resize(100,100);

$thum->show();

//$thum->save($guardarEn);

