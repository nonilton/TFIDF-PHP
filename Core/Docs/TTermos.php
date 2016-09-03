<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TTermos
 *
 * @author nonilton
 */
class TTermos {
    //put your code here
    private $termo;
    private $frequencia = 0;
    private $idf = 0;
    private $peso = 0;
    
    function __construct($termo, $freq, $idf, $peso) {
        $this->termo = $termo;
        $this->frequencia = $freq;
        $this->idf = $idf;
        $this->peso = $peso;
    }

    
    function getTermo() {
        return $this->termo;
    }
    
    function getPeso(){
        return $this->peso;
    }

    function getFrequencia() {
        return $this->frequencia;
    }
    
    function getIdf() {
        return $this->idf;
    }

    function setIdf($idf) {
        $this->idf = $idf;
    }




}
