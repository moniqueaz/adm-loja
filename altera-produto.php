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

    $categoria = new Categoria();

    $produto->setId($_REQUEST['id']);
    $produto->setNome($_REQUEST['nome']);
    $produto->setPreco($_REQUEST['preco']);
    $produto->setDescricao($_REQUEST['descricao']);
    $produto->setUsado("false");
    $produto->setCategoria($categoria);
    $categoria->setId($_REQUEST['categoria_id']);

    if(array_key_exists('usado', $_REQUEST)):
        $produto->setUsado("true");
    endif;

?>
<?php if($produtoDao->altera($produto)){?>
    <p class="alert alert-info">Produto <?= $produto->getNome() ?>, R$<?= $produto->getPreco() ?> alterado com sucesso!!!</p>
<?php }else{
        $msg = mysqli_error($conexao);
        error_log($msg);
    ?>
    <p class="alert alert-danger">Nao foi possivel alterar o produto <?= $produto->getNome() ?>!!</p>
<?php } ?>

<?php require_once 'rodape.php'; ?>