<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "conectado!";
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
    exit;
}

function mensagem($texto, $tipo)
{
    echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
}

function mostra_data($data)
{
    $d = explode('-', $data);
    $escreve = $d[2] . '/' . $d[1] . '/' . $d[0];
    return $escreve;
}
