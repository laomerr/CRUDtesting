<?php
include "../config/conexao.php";
include "../models/cliente.php";

$id = $_POST['id'] ?? null;

if ($id) {
    $cliente = new Cliente($conn);
    
    if ($cliente->excluir((int)$id)) {
        header("Location: ../views/pesquisar.php?msg=sucesso_excluir");
    } else {
        header("Location: ../views/pesquisar.php?msg=erro_excluir");
    }
} else {
    header("Location: ../views/pesquisar.php?msg=erro_id");
}
exit;