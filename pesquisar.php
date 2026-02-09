<?php
$pesquisa = $_POST['busca'] ?? '';
include "includes/conexao.php";;
$sql = "SELECT * from pessoas WHERE nome LIKE '%$pesquisa%'";
$dados = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="POST" role="search">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" id="busca" />
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pessoa = $linha['cod_pessoa'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = mostra_data($data_nascimento);
                            echo "<tr>
                                    <th scope='row'>$nome</th>
                                    <td>$endereco</td>
                                    <td>$telefone</td>
                                    <td>$email</td>
                                    <td>$data_nascimento</td>
                                    <td>
                                        <a href='editar.php?id=$cod_pessoa' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . ">Excluir</a>
                                    </td>
                                </tr>";
                        };
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="acoes/excluir.php" method="POST">
                        <p>Deseja realmente excluir este registro?</p>
                        <p id="nome_pessoa" style="font-weight: bold;">Nome da Pessoa</p>

                        <input type="hidden" name="cod_pessoa" id="cod_pessoa_input" value="">

                        <input type="hidden" name="nome" id="nome_pessoa_input" value="">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                            <input type="submit" class="btn btn-danger" value="Sim">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;

            document.getElementById('cod_pessoa_input').value = id;
            document.getElementById('nome_pessoa_input').value = nome; // Adicione essa linha!
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var search = document.getElementById('busca');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        search.addEventListener("keyup", function() {
            var valor = search.value;

            // Cria os dados para enviar como se fosse um formulário
            var formData = new FormData();
            formData.append('busca', valor);

            // Chama o arquivo busca.php (que criamos antes)
            fetch('acoes/busca.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    // Joga o resultado dentro do corpo da tabela
                    document.getElementById('resultado').innerHTML = html;
                });
        });
    </script>
</body>

</html>