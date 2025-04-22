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
        <div class="alert">
            Registro inserido com sucesso!
        </div>

        <h2>Usuários Cadastrados</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João da Silva</td>
                        <td>1990-05-12</td>
                        <td>joao@email.com</td>
                        <td>Administrador</td>
                    </tr>
                    <tr>
                        <td>Maria Souza</td>
                        <td>1985-11-23</td>
                        <td>maria@email.com</td>
                        <td>Pessoa física</td>
                    </tr>
                    <tr>
                        <td>Empresa XYZ</td>
                        <td>—</td>
                        <td>contato@xyz.com</td>
                        <td>Pessoa jurídica</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
