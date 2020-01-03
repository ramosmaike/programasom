<?php


//teste para pegar por um nome na tela da secretaria
require_once 'db_connect.php';


    
    $consulta = $_POST['consulta'];
    
    $sql = mysqli_query($connect, "select * from tb_dados WHERE palestrante like '%$consulta%'");
    while($vetor = mysqli_fetch_array($sql))
    {
    $dados = $vetor['dados'];
    $dia = $vetor['dia'];
    $sala = $vetor['sala'];
    $sessao = $vetor['sessao'];
    $palestrante = $vetor['palestrante'];
    $ordem = $vetor['ordem'];
    $observacao = $vetor['observacao'];
    $caminho = $vetor['caminho'];
    
    
   
    echo "<a href='#'>Editar </a>";
    echo "<a href='#'>Remover</a><br>";
    echo "<br>";
    echo "<hr><hr>";
    echo "<br>";
    echo "Numero da Tabela: $dados<br>";
    echo "Palestrante: $palestrante<br>";
    echo "Dia: $dia<br>";
    echo "Sala: $sala<br>";
    echo "Sessao: $sessao<br>";
    echo "Ordem: $ordem<br>";
    echo "Observacao: $observacao<br>";
    echo "Caminho do Arquivo:$caminho<br>";
    echo "<br>";
    echo "<hr><hr>";
    echo "<br>";
    }
   // header('location:indexconsultar.php');