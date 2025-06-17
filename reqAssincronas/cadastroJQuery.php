<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <!-- Inserindo jQuery via CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

  <form class="form-container">
    <h2>Formulário dinâmico - AJAX com jQuery</h2>
    <div class="form-group">
      <label for="uf">Estado (UF)</label>
      <!-- -->
      <select name="estado" id="estado">
          <?php
              require("conecta.php");

              $sql = "SELECT * FROM estado ORDER BY nome";

              $resultado = mysqli_query($conn, $sql);

              // usando a sintaxe alternativa do php para não ficar concatenando strings...
              while ($row = mysqli_fetch_assoc($resultado) ):

          ?>

              <option value="<?= $row['Uf']?>"><?= $row["Nome"] ?></option>

          <?php
              endwhile;
          ?>
      
      </select>
    </div>

    <div class="form-group">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="cidade" required>
        <option value="">Selecione a cidade</option>
        <!-- opções populadas dinamicamente (a lógica adicionada através do AJAX via jQuery -->
      </select>
    </div>

    <button type="submit" class="submit-btn">Enviar</button>
  </form>

  <script>
    
    $('#cidade').attr('disabled', 'disabled');
    
    $(document).ready(function () {
      $('#estado').change(function () {
        var uf = $('#estado').val();

        //alert('id_estado ' + uf);

        $.ajax({
          url: 'buscar_cidade.php',
          method: 'POST',
          data: { uf: uf },
          dataType: 'json',

          success: function (cidades) {
            $('select[name=cidade]').empty();

            $.each(cidades, function (key, value) {
              $('select[name=cidade]').append('<option value=' + value.id + '>' + value.municipio + '</option>');
            });

            $('#cidade').removeAttr('disabled');
          },
          error: function (data) {
            alert('houve um erro');
          }
        });
      });
    });
  </script>

</body>
</html>
