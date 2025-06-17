<?php
	$conn = mysqli_connect("127.0.0.1", "root", "", "redes");

	if (!$conn){
    	die("Houve um erro ao conectar com o banco de dados");
    }

    $uf = $_POST["uf"];

    $sql = "SELECT * FROM `municipio` where uf = '$uf'";

    $resultado = mysqli_query($conn, $sql);

  
    if (mysqli_num_rows($resultado) > 0) {

    	while ($cidade = mysqli_fetch_array($resultado) ){
    		$saida[] = array(
    			'id' => $cidade["Id"],
    			'municipio'	=>  $cidade["Nome"]
    		);
    	}
    	echo json_encode($saida);
    }
                  
?>