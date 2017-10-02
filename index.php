<?php 
require_once 'cabecalho.php';
require_once 'autoload.php'; 

$usuarioService = new UsuarioService();
?>

    <div class="text-center">
        <h1>Bem-vindo</h1>
        <?php
            if(isset($_REQUEST['falhaDeSeguranca'])):
                ?>
                <p class="text-center alert alert-danger">Voce nao tem acesso a esta funcionalidade!</p>
                <?php
            endif;
            if($usuarioService->usuarioEstaLogado()):
                ?>
                <p class="text-center alert alert-success">Voce está logado como <?=$usuarioService->usuarioLogado()?></p>
                <p><a href="logout.php">Deslogar</a></p>
                <?php
                else:
                ?>
        <h2>Login</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="">Login</label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label for="">Senha</label>
                <input type="password" class="form-control" name="senha">
            </div>
            <button class="col-md-12 btn btn-primary">Login</button>
        </form>
    </div>
    <div class="text-center col-md-6 col-md-offset-3">
    <?php
    
        if(array_key_exists('login', $_REQUEST)):
            if($_REQUEST['login'] == false):
                ?>
                <p class="alert text-danger">Usuario ou senho incorreto.</p>
                <?php
            endif;
        endif;
        
        ?>
    </div>
            <?php
            endif;
         ?>

<?php require_once 'rodape.php'; ?>