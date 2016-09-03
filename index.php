<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './Core/Docs/TProcessa.php';
include_once './Core/Docs/TDocumento.php';
include_once './Core/Docs/TTermos.php';
include_once './Core/Normalizacao/TNormalize.php';
include_once './Core/Consulta/TConsulta.php';
include_once './Core/Consulta/TSimilaridade.php';

/*    $processa = new TProcessa("documentos");
    $documentos = $processa->getDocumentos();
    echo "<table>";
    echo "<tr><td>Termo</td><td>Frequencia</td><td>IDF</td><td>Peso</td></tr>";
    for ($i = 0; $i < sizeof($documentos); $i++) {
        $termos = $documentos[$i]->getTermos();
        for ($j = 0; $j < sizeof($termos); $j++) {
            echo "<tr>";
            echo "<td>" . $termos[$j]->getTermo() . "</td><td>" . $termos[$j]->getFrequencia() . "</td><td>" . $termos[$j]->getIdf() . "</td><td>" . $termos[$j]->getPeso() . "</td>";
            echo "</tr>";
        }
    }

*/


$consulta = new TConsulta("cavalgada imperatriz");



