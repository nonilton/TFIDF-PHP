<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './Core/TAssentos.php';
/**
 * Description of TStopWord
 *
 * @author nonilton
 */
class TStopWord {
    //put your code here
    private $stopwords;
    private $acentos;
    
    public function TStopWord(){
        $this->stopwords = file("resources/stopwords");
        $this->acentos = new TAssentos();
        
        for($i=0;$i<sizeof($this->stopwords);$i++){
            $this->stopwords[$i] = trim(strtolower($this->stopwords[$i]));
        }
    }
    
    public function getStopWords(){
        return $this->stopwords;
    }
    
    public function removeStopWords($content){
        $termos = explode(" ", $this->acentos->removeAcentos($content));

        for ($i = 0; $i < sizeof($termos); $i++) {
            $termos[$i] = strtolower(trim($termos[$i]));
        }

        $novosTermos = array();

        foreach ($termos as $line) {
            if (!in_array($line, $this->stopwords)) {
                $novosTermos[] = $line;
            }
        }

        return $novosTermos;
        
    }
}
