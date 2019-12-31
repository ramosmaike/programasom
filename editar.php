<?php
/*
Este sistema foi programado por Maike Ramos
*/

// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM palestrantes WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar palestrante </h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="palestrante" id="palestrante" value="<?php echo $dados['palestrante'];?>">
                <label for="palestrante">Palestrante</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="dia" value="<?php echo $dados['dia'];?>" id="dia">
                <label for="dia">Dia</label>
            </div>

            <div class="input-field col s12">
                <input type="text" value="<?php echo $dados['sala'];?>" name="sala" id="sala">
                <label for="sala">Sala</label>
            </div>

            <div class="input-field col s12">
                <input type="text" value="<?php echo $dados['sessao'];?>" name="sessao" id="sessao">
                <label for="sessao">Sessão</label>
            </div>

            <div class="input-field col s12">
                <input type="text" value="<?php echo $dados['ordem'];?>" name="ordem" id="ordem">
                <label for="ordem">Ordem</label>
            </div>

            <div class="input-field col s12">
                <input type="hidden" value="<?php echo $dados['caminho'];?>" name="caminho" id="caminho">
                <label type="hidden" for="caminho"></label>
            </div>

            <button type="submit" name="btn-editar" class="btn"> Atualizar</button>
            <a href="index.php" class="btn green"> Lista de clientes </a>
        </form>

    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>