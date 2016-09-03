<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Similaridade;

/**
 * Description of TDocSimilar
 *
 * @author nonilton
 */
class TDocSimilar {
    //put your code here
    private $nome;
    private $similaridade;
    
    function getNome() {
        return $this->nome;
    }

    function getSimilaridade() {
        return $this->similaridade;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSimilaridade($similaridade) {
        $this->similaridade = $similaridade;
    }


}
