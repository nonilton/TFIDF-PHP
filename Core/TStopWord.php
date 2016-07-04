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
}
