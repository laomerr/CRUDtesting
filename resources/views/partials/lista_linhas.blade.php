@foreach ($empresas as $linha)
    <tr>
        <td>{{ $linha->nome }}</td>
        <td>{{ $linha->endereco }}</td>
        <td>{{ $linha->telefone }}</td>
        <td>{{ $linha->email }}</td>
        <td>
            <a href="{{ route('editar.edit', $linha->cod_pessoa) }}" class="btn btn-primary btn-sm">Editar</a>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="pegar_dados({{ $linha->cod_pessoa }}, '{{ $linha->nome }}')">
                Excluir
            </button>
        </td>
    </tr>
@endforeach
