<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of TStopWord
 *
 * @author nonilton
 */
class TStopWord {
    //put your code here
    private $stopwords;
    
    public function TStopWord(){
        $this->stopwords = file("resources/stopwords");
        
        for($i=0;$i<sizeof($this->stopwords);$i++){
            $this->stopwords[$i] = trim(strtolower($this->stopwords[$i]));
        }
    }
    
    public function getStopWords(){
        return $this->stopwords;
    }
    
    public function removeStopWords($content){
        $termos = explode(" ", $content);
        $novosTermos = array();
        for ($i = 0; $i < sizeof($termos); $i++) {
            $termos[$i] = strtolower(trim($termos[$i]));
            
            if (!in_array($termos[$i], $this->stopwords)){
                $novosTermos[] = $termos[$i];
            }
        }

        return $novosTermos;
        
    }
}
