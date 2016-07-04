<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TAdverbios
 *
 * @author nonilton
 */
class TAdverbios {
    //put your code here
    private $adverbios;
    
    public function TAdverbios(){
        $this->adverbios = file("resources/adverbios");
        for($i=0;$i<sizeof($this->adverbios);$i++){
            $this->adverbios[$i] = trim(strtolower($this->adverbios[$i]));    
        }
    }
    
    public function getAdberbios(){
        return $this->adverbios;
    }
}
