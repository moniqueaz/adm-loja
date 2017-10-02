<!-- contato.php -->
<?php 
require_once("cabecalho.php"); 
?>

<?php if(isset($_REQUEST["sucesso"])) { ?>
	<p class="alert-success"><?= $_REQUEST["sucesso"] ?></p>
<?php } ?>

<?php if(isset($_REQUEST["falha"])) { ?>
	<p class="alert-danger"><?= $_REQUEST["falha"] ?></p>
<?php } ?>

<form action="envia-contato.php" method="post">
	<div class="form-group">
		<label>Nome:</label>
		<input type="text" name="nome" class="form-control">
	</div>
	<div class="form-group">
		<label>Email:</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Mensagem:</label>
		<textarea class="form-control" name="mensagem"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php require_once("rodape.php"); ?>