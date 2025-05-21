<?php
	// valida_login.php

	// entrando na pasta usuários, pois os arquivos não estão devidamente organizados. O certo era estar na pasta raiz
	require("usuarios/conecta.php");

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha' ";

	$resultado = mysqli_query($conn, $sql);

	session_start();

	if (mysqli_num_rows($resultado) > 0 ){
		$_SESSION["usuario"] = $usuario;	// variavel de controle para saber se o usuário se autenticou
		header("location: usuarios/mostrar.php");
	} else {
		$_SESSION["erro"] = "Usuário ou senha incorretos";
		header("location: login.php");
	}
?>