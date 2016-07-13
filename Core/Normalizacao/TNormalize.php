<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TNormalize
 *
 * @author nonilton
 */
class TNormalize {
    //put your code here
    private $adverbios;
    private $stopWords;
    private $acentos;

    public function __construct() {
      $this->adverbios = new TAdverbios();
      $this->stopWords = new TStopWord();
      $this->acentos = new TAssentos();
    }    
    
    
    public function processa($content){
        $conteudo = $this->acentos->removeAcentos($content);
        $TermoSemStopWords = $this->stopWords->removeStopWords($conteudo);
        return $this->adverbios->removeAdverbios($TermoSemStopWords);
        
    }
    
    
}
