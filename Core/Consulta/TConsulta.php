<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TConsulta
 *
 * @author nonilton
 */
class TConsulta {

    //put your code here
    private $termos = array();
    private $pesos = array();
    private $documentos = array();
    private $totalDocsColecao = 0;

    public function TConsulta($dadosConsulta) {
        $normalize = new TNormalize();
        $this->termos = $normalize->processa($dadosConsulta);

        $processa = new TProcessa("documentos");
        $this->documentos = $processa->getDocumentos();
        $this->totalDocsColecao = sizeof($this->documentos);

        $this->calcularPeso($this->termos);
    }

    private function calcularPeso($termos) {
        $termosFrequencia = array_count_values($termos);
        $maxFreqTermo = max($termosFrequencia);

        for ($i = 0; $i < sizeof($termos); $i++) {
            $frequencia = new TFrequencia();
            $ocorrencias = $frequencia->totalOcorrenciasColecao($this->documentos, $termos[$i]);
            if ($ocorrencias == 0) {
                $this->pesos[] = 0;
            } else {
                $this->pesos[] = (0.5 + (0.5 * $termosFrequencia[$termos[$i]] / $maxFreqTermo)) * log($this->totalDocsColecao / $ocorrencias);
            }
        }

    }

}
