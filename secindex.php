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

           
            <div class="input-field col s12">

                <input type="text" name="palestrante" id="palestrante">
                <label for="dia">Digite o nome do palestrante para consulta</label>

            </div>
           
            <tbody>


                <?php

                // teste de select para trazer só por um nome select * from tb_dados WHERE palestrante like '%$consulta%'

                $sql = "SELECT * FROM palestrantes WHERE palestrante LIKE '%$dados%'";
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




                    </form>

    </div>
</div>

</tr>
<?php 

				endwhile;
                else: 
                    
                    ?>

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