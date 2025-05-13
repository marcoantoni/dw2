<?php
	// excluir.php

	$id = $_GET["id"];	// recuperando o paremtro da url

	require("conecta.php");	// incluindo o  arquivo que faz a conexão com o banco de dados

	$sql = "DELETE FROM usuarios WHERE id = $id";

	if (mysqli_query($conn, $sql) ){
		// consulta exececutada com sucesso
		session_start();
		$_SESSION["msg_sucesso"] = "Usuário excluído com sucesso";
		header("location: mostrar.php");
	} else {
		echo ("Houve um erro ao excluir o registro");
	}
?>