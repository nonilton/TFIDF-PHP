<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './Core/TAssentos.php';
include_once './Core/TAdverbios.php';
include_once './Core/TStopWord.php';
include_once './Core/TCalulaTFIDF.php';
include_once './Core/TFrequencia.php';

/**
 * Description of TProcessa
 *
 * @author nonilton
 */
class TProcessa {

    //put your code here
    private $documentos = array();
    private $adverbios;
    private $stopWords;
    private $totalDocumentosColecao;

    public function TProcessa($path) {
        $this->adverbios = new TAdverbios();
        $this->stopWords = new TStopWord();
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
                $TermoSemStopWords = $this->stopWords->removeStopWords($arquivo);
                $TermosSemAdverbios = $this->adverbios->removeAdverbios($TermoSemStopWords);

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

