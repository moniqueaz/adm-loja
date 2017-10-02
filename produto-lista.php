<?php

require_once 'conecta.php';
require_once 'autoload.php';
require_once 'cabecalho.php';

$produtoDao = new ProdutoDao($conexao);

$produtos = $produtoDao->lista();

?>
<h1 class="text-center">Lista</h1>
<?php
if(array_key_exists('removido', $_REQUEST)):
    if($_REQUEST['removido'] == true): ?>
        <p class="alert alert-info msg">Produto removido com sucesso.</p>
<?php 
    else: ?>
        <p class="alert alert-danger msg">Nao foi possivel remover o produto!</p>
<?php
    endif;
endif;
?>
<table class="table table-striped">
    <?php foreach($produtos as $produto):?>
        <tr>
            <td><?=$produto->getNome()?></td>
            <td><?=$produto->getPreco()?></td>
            <td><?=$produto->calculaImposto()?></td>
            <td><?=substr($produto->getDescricao(), 0, 40)?></td>
            <td><?=$produto->getCategoria()->getNome()?></td>
            <td><?=$produto->getUsado() ? "Usado" : "Novo" ; ?></td>
            <td><?=$produto->temIsbn() ? "<td>".$produto->getIsbn()."</td>" : "<td></td>" ?></td>
            <td>
                <form method="POST" action="remove-produto.php">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>">
                    <button type="submit" class="remove btn btn-danger">Remover</button>
                </form>
            </td>
            <td>
                <a href="produto-formulario.php?id=<?=$produto->getId()?>" class="btn btn-default">Alterar</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>

<script>
    [... document.querySelectorAll('table tr .remove')].forEach(a=>a.onclick = event=>{
        if(!confirm('Confirma?')){
            event.preventDefault();
        }
    });
    
    setTimeout(() => document.querySelector('.msg').remove(), 3000);

</script>
<?php
require_once 'rodape.php';