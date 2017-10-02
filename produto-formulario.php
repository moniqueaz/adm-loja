<?php 
require_once 'conecta.php';
require_once 'cabecalho.php';
require_once 'autoload.php';

$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);
$usuarioService = new UsuarioService();

$usuarioService->verificaUsuario();

$categorias = $categoriaDao->lista();

$produto = new Produto();
$produto->setCategoria(new Categoria());


$action = 'adiciona-produto.php';
$ehAlteracao = false;
$usado = "";

if($_REQUEST['id']):
    $action = 'altera-produto.php';
    $ehAlteracao = true;
    $produto = $produtoDao->busca($_REQUEST['id']);
    $usado = $produto->getUsado() ? "checked" : "";
endif;

?>

<h1><?=$ehAlteracao ? "Alterando" : "Incluindo" ?> Produtos</h1>
<form method="POST" action="<?=$action?>">
<input type="hidden" name="id" value="<?=$produto->getId()?>">
    <div class="form-group">
        <label for="">Nome</label>  
        <input type="text" name="nome" class="form-control" value="<?=$produto->getNome()?>">
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input type="number" name="preco" class="form-control" value="<?=$produto->getPreco()?>">
    </div>
    <div class="form-group">
        <label for="">Descricao</label>
        <textarea name="descricao" cols="30" rows="10" class="form-control"><?=$produto->getDescricao()?></textarea>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="usado" value="true" <?=$usado?>> Usado
        </label>
    </div>
    <div class="form-group">
        <label for="">Categorias</label>
        <select class="form-control" name="categoria_id">
        <?php
            foreach($categorias as $categoria):
        ?>
            <option value="<?=$categoria->getId()?>" <?= ($produto->getCategoria()->getId() == $categoria->getId()) ? "selected" : "" ?>><?=$categoria->getNome()?></option>
        <?php
            endforeach
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tipo de produto</label>
        <?php $ehLivro = $produto->temIsbn() ?>
        <select name="tipoProduto" id="" class="form-control">
            <option value="geral" <?=!$ehLivro?"selected":""?>>Geral</option>
            <option value="livro" <?=$ehLivro?"selected":""?>>Livro</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">ISBN (quando for um livro)</label>
        <?php   if($produto->temIsbn()):
                    $isbn = $produto->getIsbn();
                else:
                    $isbn = "";
                endif;
        ?>
        <input type="text" class="form-control" name="isbn" value="<?=$isbn?>">
    </div>
    <input type="submit" value="Salvar" class="btn btn-primary" >
</form>

<?php require_once 'rodape.php'; ?>