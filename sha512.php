<?php
	/*
		Função para criptografar uma senha com sha512 sem precisar ficar usando a função hash
	*/
	function sha512($string){
		return (hash("sha512", $string) );
	}

	$senha = 1234;

	echo ("1234 criptografado com sha512 é " . sha512($senha) );

?>