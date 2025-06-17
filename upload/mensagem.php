<?php
  
  // mensagem.php - apenas para informar o status do envio do arquivo 
  
  session_start();

  if (isset($_SESSION["msg"])){
    echo ('<p style="color: red;"> ' . $_SESSION["msg"] . '</p>');
    unset($_SESSION["msg"]);
  }
?>