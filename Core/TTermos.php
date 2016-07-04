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
    
    function __construct($termo, $freq) {
        $this->termo = $termo;
        $this->frequencia = $freq;

    }

    
    function getTermo() {
        return $this->termo;
    }

    function getFrequencia() {
        return $this->frequencia;
    }


}
