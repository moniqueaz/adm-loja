<?php
session_start();

class UsuarioService{

    function verificaUsuario(){
        if(!$this->usuarioEstaLogado()):
            header('Location:index.php?falhaDeSeguranca=true');
            die();
        endif;
    }
    
    function usuarioEstaLogado(){
        return isset($_SESSION['usuario_logado']);
    }
    
    function usuarioLogado(){
        return $_SESSION['usuario_logado'];
    }
    
    function logaUsuario($usuario){
        $_SESSION['usuario_logado'] = $usuario;
    }
    
    function logout(){
        session_destroy();
    }
}