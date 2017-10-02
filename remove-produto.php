<?php
require_once 'conecta.php';
require_once 'autoload.php';

$produtoDao = new ProdutoDao($conexao);

$id = $_REQUEST['id'];

if($produtoDao->remove($id)):
    header('Location:produto-lista.php?removido=true');
else:
    header('Location:produto-lista.php?removido=false');
endif;

die();
