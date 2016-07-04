<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Core/Processa.php';
include './Core/TDocumento.php';
include './Core/TTermos.php';

$processa = new Processa("documentos");
$documentos = $processa->getDocumentos();

for($i=0;$i<sizeof($documentos);$i++){
    echo $documentos[$i]->getNome() ." <br>";
    echo $documentos[$i]->getPath() ." <br>";
    echo $documentos[$i]->getTotalTermos() ."<br>";
    
    $termos = $documentos[$i]->getTermos();
    for ($j=0;$j<sizeof($termos);$j++){
        echo $termos[$j]->getTermo() ." - " . $termos[$j]->getFrequencia()."<br>";
    }
}

