<?php
/*
Este sistema foi programado por Maike Ramos
*/

// Header
include_once 'includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo palestrante </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input  type="text" name="palestrante" id="palestrante">
                <label for="nome">Palestrante</label>
            </div>

            <div class="input-field col s12">
                <input type="date" name="dia" id="dia">
                <label for="dia">Dia</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sala" id="sala">
                <label for="sala">Sala</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sessao" id="sessao">
                <label for="sessao">Sessão</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="ordem" id="ordem">
                <label for="ordem">Ordem</label>
            </div>

            <div class="input-field col s12">
                <label>Salvar arquivos</label>
                <br>

            </div>

            <div class="input-field col s12">
                <input type="file" name="arquivo" id="arquivo">

            </div>


            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="index.php" class="btn green"> Lista de palestrante </a>
        </form>

    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>