<?php
include "../config/conexao.php";
include "../models/cliente.php";

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];

$cliente = new Cliente($conn);
if ($cliente->Salvar($nome, $endereco, $telefone, $email, $data_nascimento)) {
  header ("Location: ../views/pesquisar.php?mensagem=successo_cadastro");
} else {
  header ("Location: ../views/pesquisar.php?mensagem=erro_cadastro");
}
?>
