<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <?php
// Captura a mensagem da URL
$msg = $_GET['msg'] ?? null;

if ($msg == 'sucesso_cadastro') {
    echo '<div class="alert alert-success">Cliente cadastrado com sucesso!</div>';
} elseif ($msg == 'sucesso_atualizar') {
    echo '<div class="alert alert-primary">Dados atualizados com sucesso!</div>';
} elseif ($msg == 'sucesso_excluir') {
    echo '<div class="alert alert-warning">Cliente excluído!</div>';
} elseif (strpos($msg, 'erro') !== false) {
    echo '<div class="alert alert-danger">Ocorreu um erro na operação.</div>';
}
?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="p-5 mb-4 bg-light rounded-3">
          <h1 class="display-4">Cadastro Web</h1>
          <p class="lead">Sistema de cadastro. Base de estudos para criação de sistemas web com PHP e MySQL.</p>
          <hr class="my-4">
          <p>Acesse as funções.</p>
          <a class="class btn btn-primary btn-lg" href="../views/cadastrar.php" role="button">Cadastro</a>
          <a class="class btn btn-primary btn-lg" href="../views/pesquisar.php" role="button">Pesquisar</a>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>