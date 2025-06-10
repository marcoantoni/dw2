<?php

	print_r(hash_algos() );	// lista os algoritmos de hash disponíveis no servidor

	echo ("<br>");

	// exemplo de uso da função hash

	$senha = "iloveyou";	// senha popular


	echo ("MD5: " . md5($senha) . "<br>");
	
	echo ("SHA512: " . hash("sha512", $senha) );

	// usando um salt para gerar um hash
	$salt = "hfjds489fds89fds637¨&%#@84";

	$nova_senha = $salt.$senha;	// concatenando a senha com o salt

	echo ("Nova senha a ser criptografada: $nova_senha <br>");
	echo ("MD5 com salt: " . md5($nova_senha) . "<br>");
	echo ("SHA512 com salt: " . hash("sha512", $nova_senha) . "<br>");
?>