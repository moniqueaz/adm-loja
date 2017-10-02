<?php
require_once 'conecta.php';
require_once 'autoload.php';

$usuairoDao = new UsuarioDao($conexao);
$usuarioService = new UsuarioService();

$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

if($usuairoDao->busca($login, $senha)):
    //setcookie('usuario_logado', $login);
    $usuarioService->logaUsuario($login);
    header('Location:index.php?login=1');
else:
    header('Location:index.php?login=0');
endif;

die();