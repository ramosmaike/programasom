<?php

require_once 'db_connect.php';

//Este sistema foi programado por Maike Ramos

// consulta ao banco de dados e trazer em js

$result_usuario = "SELECT * FROM palestrantes ORDER BY palestrante ASC";
$resultado_usuario = mysqli_query($connect, $result_usuario);

if(($resultado_usuario) and ($resultado_usuario->num_rows != 0)){
while($rom_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo $rom_usuario ['palestrante'] . "<br>";
}

}else{
    echo "nenhum caminho encontrado";
}

?>
                <!--
$sql = "SELECT * FROM palestrantes ORDER BY palestrante ASC";
            $resultado = mysqli_query($connect, $sql);

            if (mysqli_num_rows($resultado) > 0) ;

                while ($dados = mysqli_fetch_array($resultado));

-->


