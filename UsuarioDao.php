<?php

class UsuarioDao{

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    function busca($login, $senha){
        $login = mysqli_real_escape_string($this->conexao, $login);
        $senha = md5($senha);
        
        $query = "SELECT * FROM usuario WHERE login = '{$login}' AND senha = '{$senha}'";
        $resultado = mysqli_query($this->conexao, $query);
        error_log(mysqli_error($this->conexao));
        return mysqli_fetch_assoc($resultado); // se náo existe retorna null

    }
}