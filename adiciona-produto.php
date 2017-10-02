<?php 
    require_once 'conecta.php';
    require_once 'autoload.php';
    require_once 'cabecalho.php';

    $produtoDao = new ProdutoDao($conexao);
    $usuarioService = new UsuarioService();

    $usuarioService->verificaUsuario();
    if(strcasecmp($_REQUEST['tipoProduto'], 'livro') == 0):
        $produto = new Livro();
        $produto->setIsbn($_REQUEST['isbn']);
    else:
        $produto = new Produto();
    endif;
    
    $produto->setNome($_REQUEST['nome']);
    $produto->setPreco($_REQUEST['preco']);
    $produto->setDescricao($_REQUEST['descricao']);
    $produto->setCategoria($_REQUEST['categoria_id']);
    $produto->setUsado("false");

    if(array_key_exists('usado', $_REQUEST)):
        $produto->setUsado("true");
    endif;

?>
<?php if($produtoDao->insere($produto)){?>
    <p class="alert alert-info">Produto <?= $produto->getNome() ?>, R$<?= $produto->getPreco() ?> adicionado com sucesso!!!</p>
<?php }else{?>
    <p class="alert alert-danger">Nao foi possivel adicionar o produto <?= $produto->getNome() ?>!!</p>
<?php } ?>

<?php require_once 'rodape.php'; ?>