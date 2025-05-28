<?php
	
	require("usuarios/conecta.php");

	$usuario = "admin'";
	$senha = "1234";

	$sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha' ";

	// função mysqli_real_escape_string é uma alternativa para sql evitar o sql injection, porém o melhor é usar consulta parametrizadas
	// é necessrário passar dois parametros: o link da conexão com o banco de dados e a variavel a ser 'escapada'
	$usuario = mysqli_real_escape_string($conn, $usuario);
	$senha = mysqli_real_escape_string($conn, $senha);

	echo ("Usuário com os caracteres de escape . $usuario <br>");
	echo ("Senha com os caracteres de escape . $senha <br>");

	echo $sql = mysqli_real_escape_string($conn, $sql);


?>