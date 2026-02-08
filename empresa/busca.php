<?php
include "conexao.php";

$pesquisa = $_POST['busca'] ?? '';

$sql = "SELECT * from pessoas WHERE nome LIKE '%$pesquisa%'";
$dados = mysqli_query($conn, $sql);

while ($linha = mysqli_fetch_assoc($dados)) {
    $cod_pessoa = $linha['cod_pessoa'];
    $nome = $linha['nome'];
    $endereco = $linha['endereco'];
    $telefone = $linha['telefone'];
    $email = $linha['email'];
    $data_nascimento = $linha['data_nascimento'];

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
                <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-primary btn-sm'>Editar</a>
                <a href='excluir.php?cod_pessoa=$cod_pessoa' class='btn btn-danger btn-sm'>Excluir</a>
            </td>
          </tr>";
}
