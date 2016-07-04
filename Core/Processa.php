<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './Core/TAdverbios.php';
include_once './Core/TStopWord.php';

/**
 * Description of Processa
 *
 * @author nonilton
 */
class Processa {

    //put your code here
    private $documentos = array();
    private $adverbios;
    private $stopWords;

    public function Processa($path) {
        $this->adverbios = new TAdverbios();
        $this->stopWords = new TStopWord();
        $this->loadDocumentos($path);
    }

    private function removeAcentos($content) {
        $what = array('ä', 'ã', 'à', 'á', 'â', 'ê', 'ë', 'è', 'é', 'ï', 'ì', 'í', 'ö', 'õ', 'ò', 'ó', 'ô', 'ü', 'ù', 'ú', 'û', 'À', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ', 'ç', 'Ç', ' ', '-', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º', '“','”');
        $by = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A', 'A', 'E', 'I', 'O', 'U', 'n', 'n', 'c', 'C', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',' ',' ');
        return str_replace($what, $by, $content);
    }

    private function removeStopWords($content) {
        $termos = explode(" ", $this->removeAcentos($content));

        for ($i = 0; $i < sizeof($termos); $i++) {
            $termos[$i] = strtolower(trim($termos[$i]));
        }

        $novosTermos = array();

        foreach ($termos as $line) {
            if (!in_array($line, $this->stopWords->getStopWords())) {
                $novosTermos[] = $line;
            }
        }

        return $novosTermos;
    }

    //esta função deverá ser usada apos a remoção das stopwords;
    private function removeAdverbios($content) {
        $novosTermos = array();
        foreach ($content as $line) {
            if (!in_array($line, $this->adverbios->getAdberbios())) {
                $novosTermos[] = $line;
            }
        }

        return $novosTermos;
    }

    private function getTermosFrequencia($termos) {
        $termosDocumento = array();
        foreach (array_count_values($termos) as $key => $value) {
            $termosDocumento[] = new TTermos($key, $value);
        }

        return $termosDocumento;
    }

    private function loadDocumentos($path) {
        $file = scandir($path);
        $cont = count($file);
        $documentos = array();



        for ($i = 0; $i < $cont; $i++) {
            if (($file[$i] != ".") and ( $file[$i] != "..")) {
                $arquivo = file_get_contents($path . "/" . $file[$i]);
                $TermoSemStopWords = $this->removeStopWords($arquivo);
                $TermosSemAdverbios = $this->removeAdverbios($TermoSemStopWords);
                $doc = new TDocumento($file[$i], $path, $this->getTermosFrequencia($TermosSemAdverbios));
                $this->documentos[] = $doc;
            }
        }

        return $documentos;
    }

    public function getDocumentos() {
        return $this->documentos;
    }

}
