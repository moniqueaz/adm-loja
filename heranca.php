<?php

abstract class Recibo{
    function geraCabecario(){
        return "cabecalho";
    }

    function geraRodape(){
        return "rodape";
    }

    abstract function geraLinha();
}

class ReciboBradesco extends Recibo{
    function geraLinha(){
        return "gera linha em ReciboBradesco";
    }
}

$recibo = new ReciboBradesco();
echo $recibo->geraCabecario();
echo "<br>";
echo $recibo->geraLinha();
echo "<br>";
echo $recibo->geraRodape();
echo "<br>";
$recibo2 = new Recibo();
$recibo2->geraCabecario();