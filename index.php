<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Core/TProcessa.php';
include './Core/TDocumento.php';
include './Core/TTermos.php';


$processa = new TProcessa("documentos");
$documentos = $processa->getDocumentos();

//var_dump($documentos);

for($i=0;$i<sizeof($documentos);$i++){
    echo $documentos[$i]->getNome() ." <br>";
    echo $documentos[$i]->getPath() ." <br>";
    echo $documentos[$i]->getTotalTermos() ."<br>";
    
    $termos = $documentos[$i]->getTermos();
    for ($j=0;$j<sizeof($termos);$j++){
        echo "Termo:". $termos[$j]->getTermo() ." Frequencia: " . $termos[$j]->getFrequencia()." Peso:".$termos[$j]->getPeso()."<br>";
    }
}

