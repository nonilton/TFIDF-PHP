<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'TDocSimilar.php';
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
    private $similares = array();

    public function TConsulta($dadosConsulta) {
        $normalize = new TNormalize();
        $this->termos = $normalize->processa($dadosConsulta);
        $processa = new TProcessa("documentos");
        $this->documentos = $processa->getDocumentos();
        $this->totalDocsColecao = sizeof($this->documentos);
        $this->calcularPeso($this->termos);
        $this->calculaSimilaridade();
        $this->imprimir();
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

    private function calculaSimilaridade() {
        $similaridade = new Similaridade\TSimilaridade();
        for ($i = 0; $i < sizeof($this->documentos); $i++) {
            $perSimilar = $similaridade->similaridade($this->pesos, $this->documentos[$i]);

            if ($perSimilar > 0) {
                $similar = new Similaridade\TDocSimilar();
                $similar->setNome($this->documentos[$i]->getNome());
                $similar->setSimilaridade($perSimilar);

                $this->similares[] = $similar;
            }
        }
    }
    
    public function imprimir(){
        if (sizeof($this->similares) == 0) {
            echo "Nenhum documento encontrado";
        }  else {
            asort($this->similares);
            for($i=0;$i<sizeof($this->similares);$i++){
                echo $this->similares[$i]->getNome() . " - ". $this->similares[$i]->getSimilaridade()."<br>";
            }
        }
    }

}
