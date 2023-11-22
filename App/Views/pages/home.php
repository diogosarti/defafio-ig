<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>

  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
  <main>
  <?php
      if (isset($_GET['success'])) {
          echo '<p class="success-message">Cadastro realizado com sucesso!</p>';
      } elseif (isset($_GET['error'])) {
          echo '<p class="error-message">Erro ao cadastrar. Tente novamente.</p>';
      } elseif (isset($_GET['excluido']) && $_GET['excluido'] === 'true') {
        echo '<p class="success-message">Corretor excluído com sucesso!</p>';
    }
  ?>
    <form action="/register" method="post" id="formularioCadastro">
      <h2>Cadastro de Corretor</h2>
      <div>
        <div>
          <input required placeholder="Digite seu CPF" type="text" id="cpf" name="cpf">
          <span id="cpfError" class="error"></span>
        </div>
        <div>
          <input required placeholder="Digite seu Creci" type="text" id="creci" name="creci">
          <span id="creciError" class="error"></span>
        </div>
      </div>
        <input required placeholder="Digite seu nome" type="text" id="nome" name="nome">
        <span id="nomeError" class="error"></span>
        
        
        <button type="submit">Enviar</button>
    </form>

    <section class="cadastrados">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>CRECI</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['corretores'] as $corretor): ?>
          <tr>
            <td><?php echo $corretor->id; ?></td>
            <td><?php echo $corretor->nome; ?></td>
            <td><?php echo $corretor->cpf; ?></td>
            <td><?php echo $corretor->creci; ?></td>
            <td>
              <button class="edit">Editar</button>
              <button class="delete" data-corretor-id="<?php echo $corretor->id; ?>">Excluir</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    </section>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="public/js/validacao.js"></script>
  <script>
    $(".delete").on("click", function() {
        let corretorId = $(this).data("corretor-id");

        // Confirmar a exclusão
        let confirmDelete = confirm("Tem certeza de que deseja excluir este corretor?");
        if (!confirmDelete) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "/Deletecorretor", // Substitua isso pelo caminho correto do seu script de exclusão
            data: { corretorId: corretorId },
            success: function() {
              location.reload();
              window.location.href = "/?excluido=true";
            },
            error: function() {
                alert("Erro ao excluir corretor. Tente novamente.");
            }
        })
    });
  </script>
</body>
</html>