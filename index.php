<?php
/*
Este sistema foi programado por Maike Ramos
*/

if (isset($_SESSION['msg'])) {
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>

<!-- faz parte do js do select caminho-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- teste de codigos-->
<ul id="slide-out" class="sidenav">
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header">Menu<i color=red class="material-icons">arrow_drop_down</i></a>

                <div class="collapsible-body">
                    <ul>
                        <li><a href="index.php">Sistema Programasom</a></li>
                        <li><a href="secindex.php" target="_blank">Tela secretaria</a></li>
                        <li><a href="">Programador Maike Ramos</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </li>
</ul><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
<!-- fim de teste de codigos-->



<div class="row">
    <div class="col s12 m8 push-m2">

        <center><img src="imagem/programasom.png"></center>
        <h5 class="light"> Sistema de cadastro de palestrantes </h5>
        <table class="striped">
            <thead>
                <tr>
                    <th>Palestrante:</th>
                    <th>Dia:</th>
                    <th>Sala:</th>
                    <th>Sessão:</th>
                    <th>Ordem:</th>
                    <th>Caminho:</th>
                    <th>Arquivo:</th>
                </tr>

            </thead>

            <tbody>
                <?php
	$sql = "SELECT * FROM palestrantes ORDER BY palestrante ASC";
				$resultado = mysqli_query($connect, $sql);

				if (mysqli_num_rows($resultado) > 0) :

					while ($dados = mysqli_fetch_array($resultado)) :
						?>
                <tr>
                    <td><?php echo $dados['palestrante']; ?></td>
                    <td><?php echo $dados['dia']; ?></td>
                    <td><?php echo $dados['sala']; ?></td>
                    <td><?php echo $dados['sessao']; ?></td>
                    <td><?php echo $dados['ordem']; ?></td>

                    <td><?php echo $dados['caminho']; ?></td>

                    <!-- <span id="conteudo"></span>-->

                    <td><?php echo $dados['arquivo']; ?></td>
                    <td></td>

                    <!--<span id="conteudo"></span>-->

                    <script>
                    $(document).ready(function() {
                        $.post('listar_usuario.php', function(retorna) {
                            $("#conteudo").html(retorna);

                        });
                    });
                    </script>




                    <!--C:\xampp\htdocs\sistema-->

                    <!-- este código exemplo para abrir a pasta tem que fazer em modo select dentro de um js não sei se vai rolar
    <?php //exec('explorer.exe c:\Windows'); ?>-->


                    <!-- este seria o botão para chamar a pasta
                        <a class='btn-floating' href="abrirPrograma();">Abrir</a>-->


                    <!-- Este link e preciso fazer sql com a base de dados para pegar o caminho das pastas -->
                    <!--<td><a href="<?php include_once 'php_action/db_connect.php';
														$sql = "SELECT * FROM palestrantes";
														echo $dados['palestrante']; ?>" class="btn-floating red"><i class="material-icons">way</i></a></td>-->
                    <!-- Este link e preciso fazer sql com a base de dados para pegar o caminho das pastas fim deste codigo -->

                    <!--<td><input type="file" class='btn-floating' style='font-size:10000%;color:red'></td>-->

                    <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i
                                class="material-icons">edit</i></a></td>

                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i
                                class="material-icons">delete</i></a></td>

                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse palestrante?</p>
                        </div>
                        <div class="modal-footer">

                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                                <a href="#!"
                                    class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                            </form>

                        </div>
                    </div>

                </tr>
                <?php
						endwhile;
					else : ?>

                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                <?php
				endif;
				?>

            </tbody>

        </table>

        <br>
        <a href="adicionar.php" class="btn">Adicionar palestrante</a>
        <!-- talvez vou precisar deste código
		<a href="index.php?id=<?php echo $dados['palestrante']; ?>" class="btn">Procurar</a>
		-->
        <a href="index.php" class="btn green"> Lista de palestrante </a>
    </div>
</div>

<?php
// Footer
//include_once 'includes/footer.php';
include_once 'includes/footer.php';
?>