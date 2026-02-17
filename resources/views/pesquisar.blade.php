<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pesquisar - Laravel</title>
</head>

<body>
    <div class="container mt-5">
        @if (session('msg'))
            @if (session('msg') == 'sucesso_atualizar')
                <div class="alert alert-success">
                    as informações foram alteradas com sucesso
                </div>
            @elseif (session('msg') == 'sucesso_excluir')
                <div class="alert alert-success">
                    a pessoa foi excluida com sucesso
                </div>
            @endif
        @endif
        <h1>Pesquisar Empresas</h1>
        <nav class="navbar bg-light mb-3">
            <div class="container-fluid">
                <form class="d-flex" action="{{ route('pesquisar') }}" method="GET">
                    <input class="form-control me-2" type="search" name="busca" value="{{ $busca ?? '' }}"
                        placeholder="Nome">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($empresas) && count($empresas) > 0)
                    @foreach ($empresas as $linha)
                        <tr>
                            <td>{{ $linha->nome }}</td>
                            <td>{{ $linha->endereco }}</td>
                            <td>{{ $linha->telefone }}</td>
                            <td>{{ $linha->email }}</td>
                            <td>
                                <a href="{{ route('editar.edit', $linha->cod_pessoa) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    onclick="pegar_dados({{ $linha->cod_pessoa }}, '{{ $linha->nome }}')">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Nenhum registro encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="/home" class="btn btn-secondary">Voltar</a>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('excluir.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Deseja excluir: <span id="nome_pessoa" class="fw-bold"></span>?</p>
                        <input type="hidden" name="id" id="cod_pessoa_input">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa_input').value = id;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const inputBusca = document.querySelector('input[name="busca"]');
        const corpoTabela = document.querySelector('tbody');

        inputBusca.addEventListener('keyup', function() {
            const valorBusca = this.value;

            fetch(`{{ route('pesquisar') }}?busca=${valorBusca}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    corpoTabela.innerHTML = html;
                })
                .catch(error => console.warn('Erro na busca:', error));
        });
    </script>
</body>

</html>
