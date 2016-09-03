<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Similaridade;

/**
 * Description of TSimilaridade
 *
 * @author nonilton
 */
class TSimilaridade {

    //put your code here

    private function somaDosQuadrados($d) {
        $soma = 0;
        for ($i = 0; $i < sizeof($d); $i++) {
            $soma += pow($d[$i], 2);
        }

        return sqrt($soma);
    }

    public function similaridade($pesosConsulta, $documento) {
        $soma = 0;
        $QtTermosConsulta = sizeof($pesosConsulta);
        $pesoTermosDoc = array();

        $termosDocumento = $documento->getTermos();
        for ($i = 0; $i < sizeof($termosDocumento); $i++) {
            if ($i > $QtTermosConsulta - 1) {
                $soma += 0;
            } else {
                $pesoTermosDoc[] = $termosDocumento[$i]->getPeso();
                $soma += $pesosConsulta[$i] * $termosDocumento[$i]->getPeso();
            }
        }

        if ($soma == 0)
            return 0;
        else
            return $soma / ($this->somaDosQuadrados($pesosConsulta) * $this->somaDosQuadrados($pesoTermosDoc));
    }

}
