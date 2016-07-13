<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './Core/Normalizacao/TAssentos.php';
include_once './Core/Normalizacao/TAdverbios.php';
include_once './Core/Normalizacao/TStopWord.php';
include_once './Core/Pesos/TCalulaTFIDF.php';
include_once './Core/Normalizacao/TNormalize.php';
include_once './Core/Pesos/TFrequencia.php';

/**
 * Description of TProcessa
 *
 * @author nonilton
 */
class TProcessa {

    //put your code here
    private $documentos = array();
    private $totalDocumentosColecao;

    public function TProcessa($path) {
        $this->loadDocumentos($path);
    }
    
    private function getTermosFrequencia($termos, $MaxDocsCorpus) {
        $frequencia = new TFrequencia();
        return $frequencia->getTermosFrequencia($termos, $MaxDocsCorpus);
    }

    private function loadDocumentos($path) {
        $file = scandir($path);
        $documentos = array();
        $this->totalDocumentosColecao = count($file);

        for ($i = 0; $i < $this->totalDocumentosColecao; $i++) {
            if (($file[$i] != ".") and ( $file[$i] != "..")) {
                $arquivo = file_get_contents($path . "/" . $file[$i]);

                $normalize = new TNormalize();
                $TermosSemAdverbios = $normalize->processa($arquivo);

                $frequencia = new TFrequencia();
                $doc = new TDocumento($file[$i], $path, $frequencia->getTermosFrequencia($this->documentos, $TermosSemAdverbios, $this->totalDocumentosColecao));
                $this->documentos[] = $doc;
            }
        }

        return $documentos;
    }

    public function getDocumentos() {
        return $this->documentos;
    }

   
}

