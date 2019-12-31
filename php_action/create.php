<?php
/*
Este sistema foi programado por Maike Ramos
*/

// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input)
{
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if (isset($_POST['btn-cadastrar'])) :
	$palestrante = clear($_POST['palestrante']);
	$dia = clear($_POST['dia']);
	$sala = clear($_POST['sala']);
	$sessao = clear($_POST['sessao']);
	$ordem = clear($_POST['ordem']);
	$caminho = clear($_POST['caminho']);
	$arquivo = clear($_POST['arquivo']);


	$sql = "INSERT INTO palestrantes (palestrante, dia, sala, sessao, ordem, caminho, arquivo) VALUES ('$palestrante', '$dia', '$sala', '$sessao', '$ordem', '$caminho', '$arquivo')";



	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else :
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;

//aqui deu certo
$dia = "Sistema/" . $dia;
mkdir($dia, 0777, true);
echo "OK";

$sala = $dia . "/" . $sala;
mkdir($sala, 0777, true);
echo "OK1.1";

$sessao = $sala . "/" . $sessao;
mkdir($sessao, 0777, true);
echo "OK1.2";

$ordem = $sessao . "/" . $ordem;
mkdir($ordem, 0777, true);
echo "OK1.3";

$palestrante = $ordem . "/" . $palestrante;
mkdir($palestrante, 0777, true);
echo "OK1.4";

move_uploaded_file($_file['palestrante']['tmp_name'], $arquivo . $palestrante);