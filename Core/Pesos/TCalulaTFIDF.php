<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TermoFrequencia
 *
 * @author nonilton
 */
class TCalculaTFIDF {

    //put your code here
    public function calculaTF($fq, $maxfq) {
        return $fq / $maxfq;
    }

    public function calculaIDF($N, $n) {
        if ($n <= 0) {
            return 0;
        } else {
            return log($N / $n);
        }
    }

}
