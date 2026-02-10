<?php
include "../config/conexao.php";
include "../models/cliente.php";

$id = $_POST['cod_pessoa'] ?? '';
$nome = $_POST['nome'] ?? 'O registro';
$cliente = new Cliente($conn);
if ($cliente->excluir($id)) {
    mensagem("$nome excluído com sucesso!", 'success');
} else {
    mensagem("$nome não foi excluído!", 'danger');
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <title>Exclusão de Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="alert alert-info mt-3">Voltando para a lista...</div>
            <meta http-equiv="refresh" content="2;url=../views/pesquisar.php">

            <a href="../public/index.php" class="btn btn-primary">Voltar Agora</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>