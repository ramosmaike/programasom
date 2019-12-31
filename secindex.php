<?php
/*
Este sistema foi programado por Maike Ramos
*/

// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>
<div class="row">
    <div class="col s12 m8 push-m2">
        <center><img src="imagem/programasom.png"></center>
        <h5 class="light"> Sistema de cosulta ao palestrantes </h5>
        <table class="striped">
            <thead>
                <tr>
                    <th>Palestrante:</th>
                    <th>Dia:</th>
                    <th>Sala:</th>
                    <th>Sessão:</th>
                    <th>Ordem:</th>
                </tr>

            </thead>

            <tbody>
                <?php
				$sql = "SELECT * FROM palestrantes ORDER BY palestrante ASC";
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
                <tr>
                    <td><?php echo $dados['palestrante']; ?></td>
                    <td><?php echo $dados['dia']; ?></td>
                    <td><?php echo $dados['sala']; ?></td>
                    <td><?php echo $dados['sessao']; ?></td>
                    <td><?php echo $dados['ordem']; ?></td>
                    <td><?php echo $dados['caminho']; ?></td>

                    <!--<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<td><a href="#moda<?php echo $dados['id']; ?>" class="btn-floating red"><i class="material-icons">C</i></a></td>-->

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
				else: ?>

                <tr>
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
        <!--<a href="adicionar.php" class="btn">Adicionar palestrante</a>-->
        <a href="secindex.php" class="btn green"> Lista de palestrante </a>
    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>