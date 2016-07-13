<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TFrequencia
 *
 * @author nonilton
 */
class TFrequencia {
    //put your code here
    
    public function getTermosFrequencia($documentos, $termos, $MaxDocsCorpus){
        $termosDocumento = array();
        $termosFrequencia = array_count_values($termos);
        $maxter = max($termosFrequencia);

        $calcula = new TCalculaTFIDF();
        foreach ($termosFrequencia as $key => $value) {
            $tf = $calcula->calculaTF($value, $maxter);
            $idf = $calcula->calculaIDF($MaxDocsCorpus, $this->totalOcorrenciasColecao($documentos, $key));

            $termosDocumento[] = new TTermos($key, $tf, $tf * $idf);
        }

        return $termosDocumento;
        
    }
    
    public function totalOcorrenciasColecao($documentos, $termo) {
        $QtDocs = 0;

        for ($i = 0; $i < sizeof($documentos); $i++) {
            $termos = $documentos[$i]->getTermos();
            
            for ($j = 0; $j < sizeof($termos); $j++) {
                
                if ($termo == $termos[$j]->getTermo()) {
                    $QtDocs += $termos[$j]->getFrequencia();
//                    echo "$termo $QtDocs";    
                    break;
                }
            } 
        }

        return $QtDocs;
    }
    
}
