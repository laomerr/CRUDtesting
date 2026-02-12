<?php
include "../config/conexao.php";
include "../models/cliente.php";

$id = $_POST['id'] ?? null;
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];

if (!$id) {
    header("Location: ../views/pesquisar.php?mensagem=erro_id");
    exit;
}

$cliente = new Cliente($conn);

if ($cliente->atualizar((int)$id, $nome, $endereco, $telefone, $email, $data_nascimento)) {
    header("Location: ../views/pesquisar.php?mensagem=sucesso_atualizacao");
} else {
    header("Location: ../views/pesquisar.php?mensagem=erro_atualizacao");
}
exit;
