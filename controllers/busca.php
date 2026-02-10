<?php
include "../config/conexao.php";
include "../models/cliente.php";

$termo = $_POST['busca'] ?? '';
$clientemodel = new Cliente($conn);
$lista = $clientemodel->pesquisar($termo);

foreach ($lista as $pessoa) {
    $cod_pessoa = $pessoa['cod_pessoa'];
    $nome = htmlspecialchars($pessoa['nome']);
    $endereco = $pessoa['endereco'];
    $telefone = $pessoa['telefone'];
    $email = $pessoa['email'];
    $data_nascimento = $pessoa['data_nascimento'];

    if (function_exists('mostra_data')) {
        $data_nascimento = mostra_data($data_nascimento);
    }

    echo "<tr>
            <th scope='row'>$nome</th>
            <td>$endereco</td>
            <td>$telefone</td>
            <td>$email</td>
            <td>$data_nascimento</td>
            <td>
                <a href='editar.php?id=$cod_pessoa' class='btn btn-primary btn-sm'>Editar</a>
                
                <a href='#' class='btn btn-danger btn-sm' 
                   data-bs-toggle='modal' 
                   data-bs-target='#exampleModal' 
                   onclick=\"pegar_dados($cod_pessoa, '$nome')\">Excluir</a>
            </td>
        </tr>";;
}
