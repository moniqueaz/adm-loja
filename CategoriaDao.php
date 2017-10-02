<?php
require_once 'autoload.php';

class CategoriaDao{

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    
    function lista(){
        $categorias = array();
        $query = "SELECT * FROM categorias";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        
        while($array = mysqli_fetch_assoc($resultado)):
            $categoria = new Categoria();
            
            $categoria->setId($array['id']);
            $categoria->setNome($array['nome']);

            array_push($categorias, $categoria);
        endwhile;
        
        return $categorias;
    }
}