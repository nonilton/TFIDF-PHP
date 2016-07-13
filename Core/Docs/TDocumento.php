<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TDocumento
 *
 * @author nonilton
 */
class TDocumento {
    //put your code here
    private $nome;
    private $path;
    private $termos; //lista de classes TTermos
    private $totalTermos;
    
    public function __construct($nome, $path, $termos) {
        $this->nome = $nome;
        $this->path = $path;
        $this->termos = $termos;
        $this->totalTermos = count($termos);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPath() {
        return $this->path;
    }


    public function getTermos(){
        return $this->termos;
    }
    
    public function getTermo($posicao){
        return $this->termos[$posicao];
    }
    
    public function setTermos($termos){
        $this->termos = $termos;        
    }
    
    public function getTotalTermos(){
        return $this->totalTermos;
    }
    
}
