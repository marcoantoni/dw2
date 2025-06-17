<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Upload de Arquivo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .upload-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      color: #333333;
    }

    input[type="file"] {
      display: none;
    }

    .custom-file-upload {
      display: inline-block;
      padding: 10px 20px;
      cursor: pointer;
      background-color: #007BFF;
      color: #fff;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
      background-color: #0056b3;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <?php 
    session_start();
  ?>
  <div class="upload-container">
    <h2>Envie seu Arquivo</h2>
    <form method="post" enctype="multipart/form-data">
      <label for="file-upload" class="custom-file-upload">
        Escolher Arquivo
      </label>
      <input id="file-upload" type="file" name="arquivo" required>
      <br>
      <button type="submit" name="enviar">Enviar</button>
      <?php
        if (isset($_SESSION["msg"])){
          echo ('<p style="color: red;"> ' . $_SESSION["msg"] . '</p>');
          unset($_SESSION["msg"]);
        }
      ?>
    </form>
  </div>
  <?php
    
    if (isset($_POST["enviar"])){

      $uploadfile = "";

      /*
      A chave de array error contém os códigos de erros, conforme apresentado em https://www.php.net/manual/en/features.file-upload.errors.php

      O código de erro 4 indica que não foi escolhido o arquivo, logo, o != de 4 indica que foi enviado um arquivo.
      */

      if ($_FILES['arquivo']['error'] != 4){
       
        $uploaddir = 'fotos/';  // definindo a pasta para onde os arquivos serão enviados
        $ext = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);  // pegando a extensão do arquivo
        $nome_arquivo = time() . "." . $ext;  // gerando um nome aleatório, no formato 1750178591 e mantendo a extensão do arquivo - nome do arquivo pode ser armazenado no banco de dados
        $uploadfile = $uploaddir . $nome_arquivo; // string que representa o caminho do arquivo

        // movendo o arquivo enviado para o caminho especificado em $uploadfile
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
          $_SESSION["msg"] = "Arquivo enviado com sucesso.";
        } 
      } 

      header("location: mensagem.php");
    }
  ?>
</body>
</html>
