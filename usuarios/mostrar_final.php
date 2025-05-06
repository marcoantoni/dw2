<?php
    // Função para traduzir tipo(código) para um texto
    function tipoParaTexto($tipo) {
        switch ($tipo) {
            case 1: return "Administrador";
            case 2: return "Pessoa física";
            case 3: return "Pessoa jurídica";
            default: return "Desconhecido";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            margin: 0 auto;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media screen and (max-width: 600px) {
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Mensagem de sucesso -->
        <?php 
            session_start();    // para poder mostrar a mensagem de sessão
            if (isset($_SESSION["msg_sucesso"])) : 
        ?>    
            <div class="alert" id="alerta">
                Registro inserido com sucesso!
            </div>
        <?php 
            endif; 
            unset($_SESSION["msg_sucesso"]); 
        ?>


        <h2>Usuários Cadastrados</h2>
        
        <?php
            $conn = mysqli_connect("localhost", "root", "", "dw2");

            // testa se a conexão ocorreu com sucesso
            if (!$conn){
                die("Houve um erro ao conectar com o banco de dados");
            }

            // gerar a string de consulta sql
            $sql = "SELECT nome, DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento, email, tipo FROM usuarios ORDER BY nome ASC";

            $resultSet = mysqli_query($conn, $sql); 

            if (mysqli_num_rows($resultSet) > 0) {

            echo ('<div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>');

                // Recupera a próxima linha do resultado da consulta como um array associativo,
                while ($row = mysqli_fetch_assoc($resultSet)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nascimento']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . tipoParaTexto($row['tipo']) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<tr><td colspan='4'>Nenhum usuário cadastrado.</td></tr>";
            }

            mysqli_close($conn); 

        ?>
        
    </div>
</div>
<!-- esconder a div com a mensgem -->
<script>
    setTimeout(function() {
        const alertas = document.querySelectorAll('.alert');
        alertas.forEach(alerta => {
            alerta.style.opacity = '0';
            setTimeout(() => alerta.style.display = 'none', 500); // após transição
        });
    }, 5000);
</script>
</body>
</html>
