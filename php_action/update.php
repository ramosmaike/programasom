<?php
/*
Este sistema foi programado por Maike Ramos
*/

// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$palestrante = mysqli_escape_string($connect, $_POST['palestrante']);
	$dia = mysqli_escape_string($connect, $_POST['dia']);
	$sala = mysqli_escape_string($connect, $_POST['sala']);
	$sessao = mysqli_escape_string($connect, $_POST['sessao']);
	$ordem = mysqli_escape_string($connect, $_POST['ordem']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE palestrantes SET palestrante = '$palestrante', dia = '$dia', sala = '$sala', sessao = '$sessao', ordem = '$ordem' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;