<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Alteração de Cadastro</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Alterar Cadastro</h1>
                <form action="{{ route('atualizar.update', $empresa->cod_pessoa) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" required value="{{ $empresa->nome }}">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="{{ $empresa->endereco }}">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{ $empresa->telefone }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $empresa->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento"
                            value="{{ $empresa->data_nascimento }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        <a href="{{ route('pesquisar') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
