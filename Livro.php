<?php

require_once 'Produto.php';

class Livro extends Produto{
    private $isbn;

    function calculaImposto(){
        return $this->getPreco() * 0.05;
    }
    function getIsbn(){
        return $this->isbn;
    }

    function setIsbn($isbn){
        $this->isbn = $isbn;
    }
}